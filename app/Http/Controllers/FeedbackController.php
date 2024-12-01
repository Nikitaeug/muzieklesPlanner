<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\MusicLesson;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index() {

    if(Auth::user()->role == 'admin') {
        $feedbacks = Feedback::all();
    } elseif(Auth::user()->role == 'teacher') {
        $feedbacks = Feedback::where('user_id', Auth::id())->get();
    } elseif(Auth::user()->role == 'guardian') {
        $guardianId = Auth::user()->guardian->id;
        $studentIds = Student::where('guardian_id', $guardianId)->pluck('id')->toArray();
        
        $feedbacks = Feedback::whereHas('musicLesson', function($query) use ($studentIds) {
            $query->whereIn('student_id', $studentIds);
        })->get();
    } else {
        $feedbacks = Feedback::whereHas('musicLesson', function($query) {
            $query->where('student_id', Auth::id());
        })->get();
    }

    return view('feedback.index', compact('feedbacks'));
    }
    
    public function create()
    {
        
        $user = Auth::user();
        
        
        $lessons = MusicLesson::all(); 
        

        return view('feedback.create', compact('user', 'lessons'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'music_lessons_id' => 'required|integer', 
            'feedback' => 'required|string', 
        ]);

     
        Feedback::create([
            'music_lessons_id' => $request->music_lessons_id,
            'feedback' => $request->feedback,
            'user_id' => Auth::id(), 
        ]);

        return redirect()->route('feedback.index')->with('success', 'Feedback submitted successfully!');
    }

}
