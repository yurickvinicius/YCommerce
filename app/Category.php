<?php

namespace YCommerce;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function products(){
        return $this->hasMany('YCommerce\Product');
    }
}
