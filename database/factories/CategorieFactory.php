<?php

$factory->define(App\Categorie::class, function (Faker\Generator $faker) {
    return [
        "designation" => $faker->name,
    ];
});
