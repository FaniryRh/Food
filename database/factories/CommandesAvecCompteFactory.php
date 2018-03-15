<?php

$factory->define(App\CommandesAvecCompte::class, function (Faker\Generator $faker) {
    return [
        "compte_id" => factory('App\Compte')->create(),
        "user_id" => factory('App\User')->create(),
        "adresse_de_livraison" => $faker->name,
        "date_heur_souhaitee" => $faker->date("d-m-Y H:i:s", $max = 'now'),
        "date_depot_cmd" => $faker->date("d-m-Y H:i:s", $max = 'now'),
        "date_livre_cmd" => $faker->date("d-m-Y H:i:s", $max = 'now'),
        "total_addition" => $faker->randomNumber(2),
        "etat_cmd_id" => factory('App\EtatCommande')->create(),
        "typepayement_id" => factory('App\Typepayement')->create(),
        "date_encaisse" => $faker->date("d-m-Y H:i:s", $max = 'now'),
        "etat_livraison_id" => factory('App\EtatLivraison')->create(),
    ];
});
