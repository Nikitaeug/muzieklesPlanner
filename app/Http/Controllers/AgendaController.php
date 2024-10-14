<?php
namespace App\Http\Controllers;

use App\Models\musicLesson;
use App\Models\student;
use App\Models\teacher;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $events = [];
 
        $musicLessons = musicLesson::with(['student', 'teacher'])->get();
 
        foreach ($musicLessons as $lesson) {
            $events[] = [
                'title' => $lesson->student->name . ' ('.$lesson->teacher->name.')',
                'start' => $lesson->date . ' ' . $lesson->start_time,
                'end' => $lesson->date . ' ' . $lesson->end_time,
            ];
        }
 
        return view('agenda.index', compact('events'));
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
