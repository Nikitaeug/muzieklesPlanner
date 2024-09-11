<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone_number' => $this->faker->optional()->phoneNumber(),
            'specialization' => $this->faker->word(),
            'availability' => $this->faker->randomElement(['{"monday": "9-5"}', '{"tuesday": "10-4"}']), // Example JSONY
        ];
    }
}
