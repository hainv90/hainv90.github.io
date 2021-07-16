<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'                  => $faker->name,
        'slug'                  => $faker->slug,
        'price'                 => $faker->randomNumber(5),
        'sale_price'            => $faker->randomNumber(5),
        'discound'              => '0',
        'image'                 => $faker->image('public\uploads\images', 540, 640),
        'meta_title'            => $faker->title,
        'meta_desc'             => '',
        'meta_keyword'          => '',
    ];
});
