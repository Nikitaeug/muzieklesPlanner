<?php
// database/migrations/xxxx_xx_xx_create_students_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->foreignId('guardian_id')->constrained('guardians')->onDelete('cascade'); // Koppeling met de voogd
            $table->foreignId('teacher_id')->constrained('teachers')->onDelete('cascade'); // Koppeling met een leraar
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
