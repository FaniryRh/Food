<?php

$factory->define(App\Produit::class, function (Faker\Generator $faker) {
    return [
        "designation_produit" => $faker->name,
        "categorie_id" => factory('App\Categorie')->create(),
        "prix_unit_produit" => $faker->randomNumber(2),
    ];
});
