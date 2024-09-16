<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimeSlotController extends Controller
{

    // Toon de agenda
    public function showAgenda()
    {
        // Deze view moet aanwezig zijn in resources/views/agenda/index.blade.php
        return view('agenda.index');
    }
    // Toon formulier voor het aanmaken van een nieuw tijdslot
    public function create()
    {
        return view('timeslots.create');
    }

    // Verwerk en sla het nieuwe tijdslot op
    public function store(Request $request)
    {
        // Valideer de gegevens
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        // Maak het nieuwe tijdslot aan
        TimeSlot::create([
            'teacher_id' => Auth::id(), // De ingelogde leraar
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'is_booked' => false, // Het tijdslot is standaard onbezette
        ]);

        // Terugsturen naar de vorige pagina met een succesbericht
        return redirect()->back()->with('success', 'Tijdslot succesvol toegevoegd!');
    }

    // Haal de beschikbare tijdslots op en formatteer deze voor de agenda
    public function getTimeSlots()
    {
        // Haal alle niet-gereserveerde tijdslots op
        $timeSlots = TimeSlot::where('is_booked', false)->get();

        // Formatteer de tijdslots voor gebruik in een kalender (bijvoorbeeld FullCalendar)
        $events = $timeSlots->map(function ($slot) {
            return [
                'title' => 'Beschikbaar',  // Titel die wordt weergegeven op de agenda
                'start' => $slot->date . 'T' . $slot->start_time,  // Begin van het tijdslot
                'end' => $slot->date . 'T' . $slot->end_time,  // Eind van het tijdslot
                'teacher_id' => $slot->teacher_id,  // ID van de leraar
            ];
        });

        // Retourneer de gegevens als JSON
        return response()->json($events);
    }
}
