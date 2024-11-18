<?php

namespace App\Http\Controllers;

use App\Models\MusicLesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MusicLessonController extends Controller
{



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
        $lesson->teacher_id = $request->input('teacher_id'); // Voeg teacher_id toe
        $lesson->student_id = $request->input('student_id'); // Voeg student_id toe
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
    
        // Validatie
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'student_id' => 'required|exists:students,id',
            'id' => 'required|exists:music_lessons,id',
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);
    
        // Les ophalen en bijwerken
        $lesson = MusicLesson::findOrFail($request->input('id'));
        $lesson->teacher_id = $request->input('teacher_id'); // Voeg teacher_id toe
        $lesson->student_id = $request->input('student_id'); // Voeg student_id toe
        $lesson->title = $request->input('title');
        $lesson->date = $request->input('date');
        $lesson->start_time = $request->input('start_time');
        $lesson->end_time = $request->input('end_time');
        $lesson->save(); // Opslaan in de database
    

        return redirect()->route('agenda.index');
    }

    public function create(Request $request)
    {
        // Retrieve the start and end times from query parameters
        $start = $request->query('start');
        $end = $request->query('end');

        // Pass them to the view
        return view('agenda.create', compact('start', 'end'));
    }
    
    
}
