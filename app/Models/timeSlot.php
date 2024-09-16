<?php
// app/Models/TimeSlot.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'date',
        'start_time',
        'end_time',
        'is_booked'
    ];


    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function bookSlot()
    {
        $this->is_booked = true;
        $this->save();
    }
}
