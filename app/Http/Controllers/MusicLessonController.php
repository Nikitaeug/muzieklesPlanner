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

        // Fetch children for guardians
        $children = [];
        if (auth::check() && auth::user()->role === 'guardian') {
            $children = Student::where('guardian_id', auth::id())->get(); // Fetch children of the guardian
        }

        return view('agenda.available-slots', compact('availableSlots', 'children'));
    }

    public function bookLesson(Request $request, MusicLesson $lesson)
    {
        if (auth::user()->role !== 'student') {
            return redirect()->route('agenda.index')
                ->with('error', 'Only students can book lessons.');
        }

        // Verify the slot is still available
        if ($lesson->status !== 'available') {
            return back()->with('error', 'This time slot is no longer available');
        }

        $request->validate([
            'student_id' => 'required|exists:students,id',
            'is_proefles' => 'boolean',
            'comments' => 'nullable|string|max:255',
        ]);

        $lesson->update([
            'student_id' => $request->student_id,
            'status' => 'booked',
            'is_proefles' => $request->is_proefles ?? false,
            'comments' => $request->comments,
        ]);


        return redirect()->route('agenda.index')
            ->with('success', 'Lesson booked successfully');
    }

    public function cancelLesson(MusicLesson $lesson)
    {
        $user = Auth::user();

        // Check if user has permission to cancel
        if (!($user->role === 'admin' ||
            ($user->role === 'teacher' && $lesson->teacher_id === $user->teacher->id) ||
            ($user->role === 'student' && $lesson->student_id === $user->student->id))) {
            return back()->with('error', 'Unauthorized to cancel this lesson');
        }

        // If the user is an admin or teacher, delete the lesson
        if ($user->role === 'admin' || ($user->role === 'teacher' && $lesson->teacher_id === $user->teacher->id)) {
            $lesson->delete(); // Delete the lesson from the database
            return redirect()->route('agenda.index')
                ->with('success', 'Lesson deleted successfully');
        }

        // If the user is a student, update the lesson status
        if ($user->role === 'student') {
            if ($lesson->status === 'booked') {
                $lesson->update([
                    'status' => 'available',
                    'student_id' => null,
                    'is_proefles' => false,
                    'comments' => null,
                ]);
            }
            return redirect()->route('agenda.index')
                ->with('success', 'Lesson status updated successfully');
        }
    }
}
