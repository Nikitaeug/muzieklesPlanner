<?php
namespace App\Http\Controllers;

use App\Models\musicLesson;
use App\Models\student;
use App\Models\teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $events = [];
    
        $user = Auth::user();
    
        if ($user->role === 'admin') {
            $musicLessons = musicLesson::with(['student', 'teacher'])->get();
        } elseif ($user->role === 'teacher') {
            $musicLessons = musicLesson::with(['student', 'teacher'])
                                       ->where('teacher_id', $user->id)
                                       ->get();
        } elseif ($user->role === 'student') {
            $musicLessons = musicLesson::with(['student', 'teacher'])
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
