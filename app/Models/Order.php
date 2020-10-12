<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product')->withPivot('quantity');
    }

    public function statuses()
    {
        return $this->belongsToMany('App\Models\Status')->withPivot('time_status');
    }

    public function bill()
    {
        return $this->hasOne('App\Models\Bill');
    }
}
