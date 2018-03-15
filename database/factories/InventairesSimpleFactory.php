<?php

$factory->define(App\InventairesSimple::class, function (Faker\Generator $faker) {
    return [
        "cmd_simpl_id" => factory('App\CommandesSimple')->create(),
        "produit_id" => factory('App\Produit')->create(),
        "quantite" => $faker->randomNumber(2),
    ];
});
