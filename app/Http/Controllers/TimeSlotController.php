<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimeSlotController extends Controller
{
    /**
     * Toon de agenda (overzicht van tijdslots).
     */
    public function showAgenda()
    {
        // Haal alle tijdslots op voor de agenda. Je kunt filters toevoegen als dat nodig is.
        $timeSlots = TimeSlot::where('teacher_id', Auth::id())->get();

        return view('agenda.index', compact('timeSlots'));
    }

    /**
     * Toon de vorm om een nieuw tijdslot toe te voegen.
     */
    public function create()
    {
        return view('agenda.timeslots'); // Verwijst naar agenda/timeslots.blade.php
    }


    public function store(Request $request)
    {
        // Valideer de inkomende aanvraag
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        // Maak een nieuw tijdslot aan
        TimeSlot::create([
            'teacher_id' => Auth::id(), // De ingelogde leraar
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->route('agenda')->with('success', 'Tijdslot succesvol toegevoegd!');
    }

    /**
     * Verkrijg tijdslots voor de agenda in JSON-formaat (voor bijvoorbeeld een kalender).
     */
    public function getTimeSlots()
    {
        $timeSlots = TimeSlot::where('teacher_id', Auth::id())->where('is_booked', false)->get();

        $events = $timeSlots->map(function ($slot) {
            return [
                'title' => 'Beschikbaar',
                'start' => $slot->date . 'T' . $slot->start_time,
                'end' => $slot->date . 'T' . $slot->end_time,
                'teacher_id' => $slot->teacher_id,
            ];
        });

        return response()->json($events);
    }
}
