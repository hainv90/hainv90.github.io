<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function categories()
    {
    	return $this->belongsToMany(Category::class);
    }

    public function images()
    {
    	return $this->hasMany(ProductImage::class);
    }
}
