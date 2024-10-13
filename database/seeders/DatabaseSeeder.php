<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            GuardianSeeder::class,
            TeacherSeeder::class,
            StudentSeeder::class,
            MusicLessonSeeder::class,
            TimeSlotSeeder::class,
            FeedbackSeeder::class, 
        ]);
    }
}
