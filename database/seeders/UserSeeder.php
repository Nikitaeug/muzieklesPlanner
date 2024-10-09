<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create some users
        User::factory()->count(5)->create(['role' => 'student']);
        User::factory()->count(2)->create(['role' => 'teacher']);
        User::factory()->count(3)->create(['role' => 'guardian']);
    }
}

