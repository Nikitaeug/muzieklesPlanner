<?php
namespace Database\Seeders;

use App\Models\Guardian;
use App\Models\User;
use Illuminate\Database\Seeder;

class GuardianSeeder extends Seeder
{
    public function run()
    {
        $guardians = User::where('role', 'guardian')->get();

        foreach ($guardians as $guardian) {
            Guardian::factory()->create([
                'user_id' => $guardian->id,
                'phone_number' => '098-765-4321', // Adjust as necessary
            ]);
        }
    }
}
