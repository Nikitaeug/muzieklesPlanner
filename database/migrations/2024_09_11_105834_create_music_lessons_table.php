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
            $table->foreignId('teacher_id')->constrained('teachers')->onDelete('cascade');
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->string('title');
            $table->date('date');
            $table->string('comments')->nullable(); 
            $table->time('start_time');
            $table->time('end_time'); 
            $table->string('status')->default('pending');
            $table->boolean('is_proefles')->default(false); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('music_lessons');
    }
}
