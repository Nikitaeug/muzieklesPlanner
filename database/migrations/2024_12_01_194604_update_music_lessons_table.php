<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMusicLessonsTable extends Migration
{
    public function up()
    {
        Schema::table('music_lessons', function (Blueprint $table) {
            // Make student_id nullable
            $table->foreignId('student_id')->nullable()->change();
            
            // Change the default value of the status column to 'available'
            $table->string('status')->default('available')->change();
        });
    }

    public function down()
    {
        Schema::table('music_lessons', function (Blueprint $table) {
            // Revert student_id to not nullable if needed
            $table->foreignId('student_id')->nullable(false)->change();
            
            // Revert the default value back to 'pending' if needed
            $table->string('status')->default('pending')->change();
        });
    }
}
