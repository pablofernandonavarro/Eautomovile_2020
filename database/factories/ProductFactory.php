<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Product;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {

    $description_short = $faker->text;
    $slug = Str::slug($description_short, '-');

    return [

        'sku'                => $faker->unique()->numberBetween(1,200),
        'slug'               => $slug,
        'description_short'  => $description_short,
        'description_large'  => $faker->text,
        'data_interest'      => $faker->text,
        'spec'               => $faker->text,
        'brand_id'           => rand(1,4),
        'pattern_id'         => rand(1,3),
        'category_id'        => rand(1,3),
        'colour_id'          => rand(1,3),
        'date_start'         => $faker->dateTime,
        'date_finish'        => $faker->datetime,
        'quantity'           => $faker->randomDigit,
        'price'              => $faker->randomDigit,
        'discount_rate'      => $faker->randomDigit,
        'active'             => 'si',
        'visit'              => $faker->randomDigit,
        'count_sale'         => $faker->randomDigit,
        'slider'             => 'si',




    ];
});
