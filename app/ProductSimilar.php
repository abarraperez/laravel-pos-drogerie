<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSimilar extends Model
{
    protected $fillable = ['product_id','similar_id'];

    public function product()
    {
        return $this->belongsTo('App\Product','product_id');
    }

    public function similar()
    {
        return $this->belongsTo('App\Product','similar_id');
    }
}
