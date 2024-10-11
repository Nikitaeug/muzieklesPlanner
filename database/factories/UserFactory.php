<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role' => $this->faker->randomElement(['student', 'teacher', 'guardian', 'admin']),
            'remember_token' => Str::random(10),
        ];
    }

    public function student()
    {
        return $this->state(function (array $attributes) {
            return ['role' => 'student'];
        });
    }

    public function teacher()
    {
        return $this->state(function (array $attributes) {
            return ['role' => 'teacher'];
        });
    }

    public function guardian()
    {
        return $this->state(function (array $attributes) {
            return ['role' => 'guardian'];
        });
    }

    public function admin()
    {
        return $this->state(function (array $attributes) {
            return ['role' => 'admin'];
        });
    }
}
