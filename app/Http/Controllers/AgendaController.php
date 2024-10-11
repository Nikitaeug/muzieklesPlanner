<?php
namespace App\Http\Controllers;

use App\Models\musicLesson;
use App\Models\student;
use App\Models\teacher;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    // Method to show the agenda (list of music lessons)
    public function showAgenda()
    {
        // Fetch all lessons to display
        $lessons = musicLesson::with(['teacher', 'student'])->get();
    
        // Transform lessons into the events format for FullCalendar
        $events = $lessons->map(function($lesson) {
            return [
                'title' => $lesson->student->name, // Assuming you want to display the student's name
                'start' => $lesson->date . 'T' . $lesson->start_time, // Combine date and start_time for FullCalendar
                'end' => $lesson->date . 'T' . $lesson->end_time,
                'status' => $lesson->status,
                'is_proefles' => $lesson->is_proefles,
            ];
        });
    
        return view('agenda.index', compact('events')); // Pass events to the view
    }

    // Method to show the form for creating a new lesson
    public function create()
    {
        // Fetch teachers and students for the form
        $teachers = teacher::all();
        $students = student::all();

        return view('agenda.create', compact('teachers', 'students'));
    }

    // Method to store a new lesson
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'student_id' => 'required|exists:students,id',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'status' => 'required|string',
            'is_proefles' => 'required|boolean',
        ]);

        // Save the lesson to the database
        musicLesson::create($request->all());

        // Redirect back to the agenda with a success message
        return redirect()->route('agenda.index')->with('success', 'Music lesson created successfully!');
    }
}
