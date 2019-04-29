<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'description' => $faker->text,
        'price' => $faker->randomNumber(2),
        'old_price' => $faker->randomNumber(2),
        'availability' => $faker->numberBetween(0, 1),
        'is_new' => $faker->numberBetween(0, 1),
        'is_sale' => $faker->numberBetween(0, 1),
        'features' => [
            'size' => 'large',
            'color'=>'red'
        ],
        'code' => $faker->numberBetween(1, 1000),
        'discount' => $faker->numberBetween(1, 100),
        'rating' => $faker->numberBetween(1, 6),
        'image_id' => 1,
    ];
});
