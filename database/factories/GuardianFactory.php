<?php
namespace Database\Factories;

use App\Models\Guardian;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuardianFactory extends Factory
{
    protected $model = Guardian::class;

    public function definition()
    {
        return [
            'user_id' => User::factory()->guardian(),
            'phone_number' => $this->faker->phoneNumber(),
        ];
    }
}
