<?php

$factory->define(App\Typepayement::class, function (Faker\Generator $faker) {
    return [
        "designation_typepayement" => $faker->name,
    ];
});
