<?php

$factory->define(App\Gallerie::class, function (Faker\Generator $faker) {
    return [
        "titre" => $faker->name,
        "description" => $faker->name,
    ];
});
