<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Product;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {

    $description_short = $faker->sentence;
    $slug = Str::slug($description_short, '-');

    return [

        'sku'                => $faker->unique()->numberBetween(1,100),
        'slug'               => $slug,
        'description_short'  => $description_short,
        'description_large'  => $faker->sentence,
        'data_interest'      => $faker->sentence,
        'spec'               => $faker->sentence,
        'brand_id'           => rand(1,4),
        'pattern_id'         => rand(1,3),
        'category_id'        => rand(1,3),
        'date_start'         => $faker->dateTime,
        'date_finish'        => $faker->datetime,
        'quantity'           => $faker->randomDigit,
        'price'              => $faker->randomDigit,
        'discount_rate'      => $faker->randomDigit,
        'active'             => 'off',
        'visit'              => $faker->randomDigit,
        'count_sale'         => $faker->randomDigit,
        'slider'             => 'off',




    ];
});
