<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create an admin user
        User::factory()->admin()->create([
            'email' => 'admin@example.com',
        ]);
    }
}

