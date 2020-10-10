<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    public function vehiclebrand()
    {
        return $this->belongsTo('App\Models\VehicleBrand');
    }

    public function vehicletype()
    {
        return $this->belongsTo('App\Models\VehicleType');
    }
}
