<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductBioequivalent extends Model
{
    protected $fillable = ['product_id','bioequivalent_id'];

    public function product()
    {
        return $this->belongsTo('App\Product','product_id');
    }

    public function bioequivalent()
    {
        return $this->belongsTo('App\Product','bioequivalent_id');
    }
    
}
