<?php

$factory->define(App\Option::class, function (Faker\Generator $faker) {
    return [
        "designation_option" => $faker->name,
    ];
});
