<?php

$factory->define(App\Actualite::class, function (Faker\Generator $faker) {
    return [
        "titre" => $faker->name,
        "description" => $faker->name,
    ];
});
