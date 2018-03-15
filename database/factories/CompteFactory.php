<?php

$factory->define(App\Compte::class, function (Faker\Generator $faker) {
    return [
        "nom_compte" => $faker->name,
        "prenom_compte" => $faker->name,
        "mdp_compte" => str_random(10),
        "phone_compte" => $faker->name,
        "mail_compte" => $faker->name,
        "adresse_compte" => $faker->name,
        "ville_compte" => $faker->name,
        "quartier_compte" => $faker->name,
        "solde_compte" => $faker->randomNumber(2),
    ];
});
