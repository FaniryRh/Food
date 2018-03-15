<?php

$factory->define(App\InventairesAvecCompte::class, function (Faker\Generator $faker) {
    return [
        "cmd_compt_id" => factory('App\CommandesAvecCompte')->create(),
        "produit_id" => factory('App\Produit')->create(),
        "quantite" => $faker->randomNumber(2),
    ];
});
