<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function productbrand()
    {
        return $this->belongsTo('App\Models\ProductBrand');
    }

    public function productclassification()
    {
        return $this->belongsTo('App\Models\ProductClassification');
    }

    public function productfeatures()
    {
        return $this->belongsToMany('App\Models\ProductFeature', 'feature_product');
    }


    // public function productfeatures()
    //{
    //  return $this->belongsToMany('App\Models\Product')->withPivot('feature_product');;
    //}


    public function orders()
    {
        return $this->belongsToMany('App\Models\Order')->withPivot('quantity');
    }
}
