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



    public function create()
    {
    
        $teachers = teacher::all();
        $students = student::all();

        return view('agenda.create', compact('teachers', 'students'));
    }

    
    public function store(Request $request)
    {
        
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'student_id' => 'required|exists:students,id',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'status' => 'required|string',
            'is_proefles' => 'required|boolean',
        ]);

     
        musicLesson::create($request->all());

       
        return redirect()->route('agenda.index')->with('success', 'Music lesson created successfully!');
    }
}
