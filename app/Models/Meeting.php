<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $table = 'meetings';

    protected $fillable = [ 'title', 'organizer', 'start_time', 'end_time', 'participants' ];
    
    public function organizer()
    {
        return $this->belongsTo(Employee::class, 'organizer', 'id');
    }
    
    public function participants()
    {
        return $this->belongsToMany(Employee::class, 'employee_meeting', 'meeting_id', 'employee_id');
    }
}
