<?php
namespace Database\Factories;

use App\Models\Teacher;
use App\Models\User; // Import the User model
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    protected $model = Teacher::class;

    public function definition()
    {
        // Create a user and associate with the teacher
        $user = User::factory()->create(); // Create the user

        return [
            'user_id' => $user->id, // Assign the user ID to the teacher
            'phone_number' => $this->faker->phoneNumber,
            'specialization' => $this->faker->word, // Adjust this if necessary
            'availability' => $this->faker->randomElement(['available', 'unavailable']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
