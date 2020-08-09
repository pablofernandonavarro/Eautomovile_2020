<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Note;

$factory->define(Note::class, function (Faker $faker) {
    return [
        'description' => $faker->sentence,
        
    ];
});
