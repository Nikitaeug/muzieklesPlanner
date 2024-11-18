<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'music_lessons_id',
        'user_id',
        'feedback',
    ];

    public function lesson()
    {
        return $this->belongsTo(MusicLesson::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function musicLesson()
{
    return $this->belongsTo(MusicLesson::class, 'music_lessons_id');
}
}
