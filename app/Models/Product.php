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

    //I need to find where I am getting this error: error: "Call to undefined method App\Models\Product::product_features()" when doing the insert in angular
    public function product_features()
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
