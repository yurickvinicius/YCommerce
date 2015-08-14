<?php

namespace YCommerce;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'extension'
    ];

    public function product(){
        return $this->belongsTo('YCommerce\Product');
    }
}
