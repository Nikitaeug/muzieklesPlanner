<?php
// database/factories/TimeSlotFactory.php

namespace Database\Factories;

use App\Models\TimeSlot;
use App\Models\Teacher; // Zorg ervoor dat je dit model hebt
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class TimeSlotFactory extends Factory
{
    protected $model = TimeSlot::class;

    public function definition()
    {
        $startTime = $this->faker->dateTimeBetween('now', '+1 week'); // Genereert een tijd ergens tussen nu en een week later
        $endTime = Carbon::instance($startTime)->addMinutes(30); // Voegt 30 minuten toe aan de starttijd

        return [
            'teacher_id' => Teacher::factory(), // Verwijzing naar de leraar
            'date' => $startTime->format('Y-m-d'), // Datum van het tijdslot
            'start_time' => $startTime->format('H:i:s'), // Starttijd
            'end_time' => $endTime->format('H:i:s'), // Eindtijd
            'is_booked' => $this->faker->boolean(20), // 20% kans dat het tijdslot al geboekt is
        ];
    }
}
