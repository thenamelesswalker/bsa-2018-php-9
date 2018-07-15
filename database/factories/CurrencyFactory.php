<?php

use Faker\Generator as Faker;

$factory->define(App\Currency::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'short_name' => $faker->currencyCode,
        'price' => $faker->randomNumber(5),
        'logo_url' => $faker->imageUrl(20,20),
    ];
});
