<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MusicLesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'student_id',
        'title',
        'date',
        'comments',
        'start_time',
        'end_time',
        'status',
        'is_proefles',
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
