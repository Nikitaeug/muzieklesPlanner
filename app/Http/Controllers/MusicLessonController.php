<?php
namespace App\Http\Controllers;

use App\Models\musicLesson;
use Illuminate\Http\Request;

class MusicLessonController extends Controller
{
    // Method to get lessons as JSON for the FullCalendar
    public function getLessons()
    {
        $lessons = musicLesson::with(['teacher', 'student'])->get();

        $events = $lessons->map(function($lesson) {
            return [
                'title' => $lesson->student->name, // Display the student's name
                'start' => $lesson->date . 'T' . $lesson->start_time, // Combine date and start_time for FullCalendar
                'end' => $lesson->date . 'T' . $lesson->end_time,
                'status' => $lesson->status,
                'is_proefles' => $lesson->is_proefles,
            ];
        });

        return response()->json($events); // Return events as JSON
    }
}
