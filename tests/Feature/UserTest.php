<?php
namespace Tests\Feature;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Guardian;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_be_associated_with_a_teacher()
    {
        $teacher = Teacher::factory()->create();
        $user = User::factory()->create([
            'roleable_id' => $teacher->id,
            'roleable_type' => Teacher::class,
        ]);

        $this->assertInstanceOf(Teacher::class, $user->roleable);
        $this->assertEquals($teacher->id, $user->roleable->id);
    }

    public function test_user_can_be_associated_with_a_student()
    {
        $student = Student::factory()->create();
        $user = User::factory()->create([
            'roleable_id' => $student->id,
            'roleable_type' => Student::class,
        ]);

        $this->assertInstanceOf(Student::class, $user->roleable);
        $this->assertEquals($student->id, $user->roleable->id);
    }

    public function test_user_can_be_associated_with_a_guardian()
    {
        $guardian = Guardian::factory()->create();
        $user = User::factory()->create([
            'roleable_id' => $guardian->id,
            'roleable_type' => Guardian::class,
        ]);

        $this->assertInstanceOf(Guardian::class, $user->roleable);
        $this->assertEquals($guardian->id, $user->roleable->id);
    }
}