<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicLesson extends Model
{
    use HasFactory;

    protected $fillable = [
    'teacher_id',
    'student_id',
    'date',
    'start_time',
    'end_time',
    'status',
    'is_proefles',
    ];
}
