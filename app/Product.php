<?php

namespace YCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'featured',
        'recomended',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo('YCommerce\Category');
    }
}
