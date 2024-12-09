<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = ['name', 'department', 'email'];

    public function meetings()
    {
        return $this->belongsToMany(Meeting::class, 'employee_meeting', 'employee_id', 'meeting_id');
    }
}
