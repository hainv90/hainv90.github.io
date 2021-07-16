<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // protected $fillable = [
    // 	'name', 
    // 	'slug',
    // 	'meta_title'
    // ];
    protected $guarded = [];

    public function products()
    {
    	return $this->belongsToMany(Product::class);
    }

}
