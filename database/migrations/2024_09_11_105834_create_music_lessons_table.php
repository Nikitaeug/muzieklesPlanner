<?php
// database/migrations/xxxx_xx_xx_create_music_lessons_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicLessonsTable extends Migration
{
    public function up()
    {
        Schema::create('music_lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('teachers')->onDelete('cascade'); // Leraar
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade'); // Student
            $table->date('date'); // Datum van de les
            $table->time('start_time'); // Starttijd van de les
            $table->time('end_time'); // Eindtijd van de les
            $table->string('status')->default('pending'); // Status van de les, bijv. 'completed' of 'pending'
            $table->boolean('is_proefles')->default(false); // Geeft aan of het een proefles is
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('music_lessons');
    }
}
