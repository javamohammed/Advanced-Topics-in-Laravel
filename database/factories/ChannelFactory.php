<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\channel;
use Faker\Generator as Faker;

$factory->define(channel::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->word
    ];
});
