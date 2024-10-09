<?php
namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        return [
            'guardian_id' => null, // To be set when creating
            'teacher_id' => null, // To be set when creating
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
