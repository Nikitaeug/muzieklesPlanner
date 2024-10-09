<?php
namespace Database\Seeders;

use App\Models\guardian;
use App\Models\Student;
use App\Models\teacher;
use App\Models\User;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $guardians = guardian::all();
        $teachers = teacher::all();

        // Create students and assign a guardian and a teacher
        foreach (User::where('role', 'student')->get() as $student) {
            Student::factory()->create([
                'user_id' => $student->id,
                'guardian_id' => $guardians->random()->id, // Randomly assign a guardian
                'teacher_id' => $teachers->random()->id, // Randomly assign a teacher
            ]);
        }
    }
}
