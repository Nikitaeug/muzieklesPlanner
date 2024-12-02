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

    public function teacher()
   {
       return $this->belongsTo(Teacher::class);
   }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
