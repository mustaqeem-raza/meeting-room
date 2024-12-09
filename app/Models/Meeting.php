<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $table = 'meetings';

    protected $fillable = [ 'title', 'organizer', 'start_time', 'end_time', 'participants' ];
    
    protected $casts = [
        'participants' => 'array', // Convert the participants field to an array
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_meeting', 'meeting_id', 'employee_id');
    }
}
