<?php
namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    public function run()
    {
        $teachers = User::where('role', 'teacher')->get();

        foreach ($teachers as $teacher) {
            Teacher::factory()->create([
                'user_id' => $teacher->id,
                'phone_number' => '123-456-7890', // Use random phone numbers or adjust as necessary
                'specialization' => 'Mathematics', // Adjust as needed
            ]);
        }
    }
}
