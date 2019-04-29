<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name', 'description', 'price','old_price',
        'availability',
        'is_new','is_sale','features',
        'code','discount',
        'rating','image_id'
    ];

    protected $casts = [
        'features'=>'array'
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }
}
