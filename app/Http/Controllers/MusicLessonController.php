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
        $events = [];
        $user = Auth::user();
    
        if ($user->role === 'admin') {
            $musicLessons = MusicLesson::with(['student', 'teacher'])->get();
        } elseif ($user->role === 'teacher') {
            $musicLessons = MusicLesson::with(['student', 'teacher'])
                                     ->where('teacher_id', $user->id)
                                     ->get();
        } elseif ($user->role === 'student') {
            $musicLessons = MusicLesson::with(['student', 'teacher'])
                                     ->where('student_id', $user->id)
                                     ->get();
        }
    
        foreach ($musicLessons as $lesson) {
            $events[] = [
                'title' => $lesson->student->name . ' (' . $lesson->teacher->name . ')',
                'start' => $lesson->date . ' ' . $lesson->start_time,
                'end' => $lesson->date . ' ' . $lesson->end_time,
            ];
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

    public function getLessons()
    {
        $lessons = MusicLesson::with(['teacher.user', 'student.user'])->get();

        if ($lessons->isEmpty()) {
            return response()->json(['message' => 'No lessons found'], 404);
        }

        $events = $lessons->map(function($lesson) {
            return [
                'id' => $lesson->id,
                'title' => $lesson->title,
                'start' => $lesson->date . 'T' . $lesson->start_time,
                'end' => $lesson->date . 'T' . $lesson->end_time,
                'extendedProps' => [
                    'teacher' => $lesson->teacher->user->name ?? 'Unknown Teacher', 
                    'student' => $lesson->student->user->name ?? 'Unknown Student',
                    'comments' => $lesson->comment ?? 'No comment provided',
                    'is_proefles' => $lesson->is_proefles,
                ],
            ];
        });

        return response()->json($events);
    }

    public function store(Request $request)
    {
        Log::info('Store method called', $request->all());
    
        // Validatie
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'student_id' => 'required|exists:students,id',
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'comments' => 'string|max:255',
        ]);
    
        // Nieuw lesobject aanmaken
        $lesson = new MusicLesson();
        $lesson->teacher_id = $request->input('teacher_id'); 
        $lesson->student_id = $request->input('student_id'); 
        $lesson->title = $request->input('title');
        $lesson->date = $request->input('date');
        $lesson->start_time = $request->input('start_time');
        $lesson->end_time = $request->input('end_time');
        $lesson->comments = $request->input('comments');
        $lesson->save(); // Opslaan in de database
    
        return redirect()->route('agenda.index');
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
}
