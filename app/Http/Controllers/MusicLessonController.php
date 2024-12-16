<?php

namespace App\Http\Controllers;

use App\Models\MusicLesson;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MusicLessonController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        switch ($user->role) {
            case 'admin':
                $events = MusicLesson::with(['teacher', 'student.user'])
                    ->orderBy('date')
                    ->get();
                break;

            case 'teacher':
                $teacher = $user->teacher;

                if ($teacher) {
                    $events = MusicLesson::with(['student.user'])
                        ->where('teacher_id', $teacher->id)
                        ->orderBy('date')
                        ->get();
                }
                break;

            case 'student':
                $student = $user->student;
                if ($student) {
                    $events = MusicLesson::with(['teacher', 'student'])
                        ->where('student_id', $student->id)
                        ->orderBy('date')
                        ->get();
                }
                break;

            case 'guardian':
                // Get all lessons for the guardian's children
                $guardian = $user->guardian;
                if ($guardian) {
                    $studentIds = Student::where('guardian_id', $guardian->id)
                        ->pluck('id');
                    
                    $events = MusicLesson::with(['teacher', 'student.user'])
                        ->whereIn('student_id', $studentIds)
                        ->orderBy('date')
                        ->get();
                }
                break;

            default:
                $events = [];
                break;
        }

        return view('agenda.index', compact('events'));
    }

    public function create(Request $request)
    {
        $start = $request->query('start');
        $end = $request->query('end');
        $teachers = Teacher::all();
        $students = Student::all();

        return view('agenda.create', compact('start', 'end', 'teachers', 'students'));
    }

    public function store(Request $request)
    {
        Log::info('Store method called', $request->all());

        if (auth::user()->role !== 'teacher') {
            return redirect()->route('agenda.index')
                ->with('error', 'Only teachers can create available slots.');
        }

        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date|after:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);


        $teacher = auth::user()->teacher;
        if (!$teacher) {
            return redirect()->route('agenda.index')
                ->with('error', 'Teacher not found.');
        }

        // Create new available slot
        $lesson = new MusicLesson();
        $lesson->teacher_id = $teacher->id; // Use the teacher's ID
        $lesson->title = $request->title;
        $lesson->date = $request->date;
        $lesson->start_time = $request->start_time;
        $lesson->end_time = $request->end_time;
        $lesson->status = 'available';
        $lesson->save();

        return redirect()->route('agenda.availability')
            ->with('success', 'Time slot added successfully');
    }

    public function update(Request $request)
    {
        Log::info('Update method called', $request->all());

        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'student_id' => 'required|exists:students,id',
            'id' => 'required|exists:music_lessons,id',
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $lesson = MusicLesson::findOrFail($request->input('id'));
        $lesson->teacher_id = $request->input('teacher_id');
        $lesson->student_id = $request->input('student_id');
        $lesson->title = $request->input('title');
        $lesson->date = $request->input('date');
        $lesson->start_time = $request->input('start_time');
        $lesson->end_time = $request->input('end_time');
        $lesson->save();

        return redirect()->route('agenda.index');
    }

    public function teacherAvailability()
    {
        if (auth::user()->role !== 'teacher') {
            return redirect()->route('agenda.index')
                ->with('error', 'Only teachers can access this page.');
        }

        $teacherId = auth::user()->teacher->id;

        $availableSlots = MusicLesson::where('teacher_id', $teacherId)
            ->where('status', 'available')
            ->where('date', '>=', now())
            ->orderBy('date')
            ->orderBy('start_time')
            ->get();

        return view('agenda.availability', compact('availableSlots'));
    }


    public function availableSlots()
    {
        $availableSlots = MusicLesson::with('teacher')
            ->where('status', 'available')
            ->where('date', '>=', now())
            ->orderBy('date')
            ->orderBy('start_time')
            ->get();

        
        $children = [];
        if (auth::check() && auth::user()->role === 'guardian') {
            $children = Student::where('guardian_id', auth::user()->guardian->id)->get();
        }

        return view('agenda.available-slots', compact('availableSlots', 'children'));
    }

    public function bookLesson(Request $request, MusicLesson $lesson)
    {
        try {
            if (!auth::check()) {
                return redirect()->route('agenda.index')
                    ->with('error', 'You must be logged in to book lessons.');
            }

            // Verify the slot is still available
            if ($lesson->status !== 'available') {
                return back()->with('error', 'This time slot is no longer available');
            }

            $request->validate([
                'student_id' => 'required|exists:students,id',
                'is_proefles' => 'boolean', // Now it will be a boolean
                'comments' => 'nullable|string|max:255',
            ]);

            // Update the lesson with the correct values
            $lesson->update([
                'student_id' => $request->student_id,
                'status' => 'booked',
                'is_proefles' => $request->input('is_proefles'), // This will now be true or false
                'comments' => $request->comments,
            ]);

            return redirect()->route('agenda.index')
                ->with('success', 'Lesson booked successfully');
        } catch (\Exception $e) {
            return redirect()->route('agenda.index')
                ->with('error', 'An error occurred while booking the lesson. Please try again.');
        }
    }

    public function cancelLesson(MusicLesson $lesson)
    {
        $user = Auth::user();
        
        Log::info('Cancel Lesson Attempt', [
            'user_role' => $user->role,
            'user_id' => $user->id,
            'lesson_id' => $lesson->id,
            'lesson_status' => $lesson->status,
            'lesson_student_id' => $lesson->student_id,
            'user_student_id' => $user->student->id ?? null
        ]);

        // Check if user has permission to cancel
        if ($user->role === 'admin') {
            $hasPermission = true;
        } elseif ($user->role === 'teacher' && $user->teacher) {
            $hasPermission = $lesson->teacher_id === $user->teacher->id;
        } elseif ($user->role === 'student' && $user->student) {
            $hasPermission = $lesson->student_id === $user->student->id;
        } elseif ($user->role === 'guardian' && $user->guardian) {
            // Check if the lesson's student is one of the guardian's children
            $guardianStudentIds = Student::where('guardian_id', $user->guardian->id)->pluck('id');
            $hasPermission = $guardianStudentIds->contains($lesson->student_id);
        } else {
            $hasPermission = false;
        }


        if (!$hasPermission) {
            return back()->with('error', 'Unauthorized to cancel this lesson');
        }

        if ($user->role === 'student' || $user->role === 'guardian') {
            if ($lesson->status === 'booked') {
                Log::info('Attempting to update lesson', [
                    'before_update' => $lesson->toArray()
                ]);

                $lesson->status = 'available';
                $lesson->student_id = null;
                $lesson->is_proefles = false;
                $lesson->comments = null;
                $lesson->save();

                Log::info('After update', [
                    'after_update' => $lesson->fresh()->toArray()
                ]);

                return redirect()->route('agenda.index')
                    ->with('success', 'Lesson cancelled successfully');
            }
        }


        if ($user->role === 'admin' || ($user->role === 'teacher' && $lesson->teacher_id === $user->teacher->id)) {
            $lesson->delete();
            return redirect()->route('agenda.index')
                ->with('success', 'Lesson deleted successfully');
        }

        return back()->with('error', 'Unable to process cancellation');
    }
}
