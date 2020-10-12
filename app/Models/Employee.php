<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function employeeposition()
    {
        return $this->belongsTo('App\Models\EmployeePosition');
    }

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle');
    }

    public function Order()
    {
        return $this->hasOne('App\Models\Order');
    }
}
