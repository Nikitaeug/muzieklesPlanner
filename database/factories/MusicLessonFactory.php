<?php

namespace Database\Factories;

use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\musicLesson>
 */
class MusicLessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'teacher_id' => Teacher::inRandomOrder()->first()->id,
            'student_id' => Student::inRandomOrder()->first()->id,
            'date' => fake()->date(),
            'start_time' => fake()->time(),
            'end_time' => fake()->time(),
            'status' => fake()->randomElement(['pending', 'completed']),
            'is_proefles' => fake()->boolean(),
        ];
    }
}
