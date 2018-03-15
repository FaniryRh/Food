<?php

$factory->define(App\EtatCommande::class, function (Faker\Generator $faker) {
    return [
        "designation_etatcom" => $faker->name,
    ];
});
