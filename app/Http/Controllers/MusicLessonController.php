<?php

namespace App\Http\Controllers;

use App\Models\musicLesson;
use Illuminate\Http\Request;

class MusicLessonController extends Controller
{
    public function getLessons()
{
    $lessons = musicLesson::with(['teacher', 'student'])->get();

    if ($lessons->isEmpty()) {
        return response()->json(['message' => 'No lessons found'], 404); // Just for debugging
    }

    $events = $lessons->map(function($lesson) {
        return [
            'title' => $lesson->student->name,
            'start' => $lesson->date . 'T' . $lesson->start_time,
            'end' => $lesson->date . 'T' . $lesson->end_time,
            'status' => $lesson->status,
            'is_proefles' => $lesson->is_proefles,
        ];
    });

    return response()->json($events);
}

}
