<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'feature_product');
    }
}
