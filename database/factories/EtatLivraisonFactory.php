<?php

$factory->define(App\EtatLivraison::class, function (Faker\Generator $faker) {
    return [
        "designation_etatlivraison" => $faker->name,
    ];
});
