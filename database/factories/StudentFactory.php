<?php
namespace Database\Factories;

use App\Models\Student;
use App\Models\User;
use App\Models\Guardian;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        return [
            'user_id' => User::factory()->student(),
            'guardian_id' => Guardian::factory(),
        ];
    }
}
