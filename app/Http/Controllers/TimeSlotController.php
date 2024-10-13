<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use Illuminate\Http\Request;
use App\Helpers\Notification;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TimeSlotRequest;

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


    public function store(TimeSlotRequest $request)
{
    $validatedData = $request->validated();

    TimeSlot::create(array_merge($validatedData, [
        'teacher_id' => Auth::id(),
    ]));

    session()->flash('success', 'Tijdslot succesvol toegevoegd!');
    return redirect()->route('agenda');
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
