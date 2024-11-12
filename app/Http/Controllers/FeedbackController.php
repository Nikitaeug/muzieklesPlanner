<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\MusicLesson;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index() {
        
    
        $feedbacks = Feedback::where('user_id', Auth::id())->get();
    
      
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
