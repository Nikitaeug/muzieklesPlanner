<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TimeSlot;

class TimeSlotSeeder extends Seeder
{
    public function run()
    {
        // Genereer 50 tijdslots
        TimeSlot::factory()->count(50)->create();
    }
}
