<?php

$factory->define(App\CommandesSimple::class, function (Faker\Generator $faker) {
    return [
        "nom_client" => $faker->name,
        "adresse_client" => $faker->name,
        "phone_client" => $faker->name,
        "adresse_de_livraison" => $faker->name,
        "total_addition" => $faker->randomNumber(2),
        "date_encaisse" => $faker->date("d-m-Y H:i:s", $max = 'now'),
        "user_id" => factory('App\User')->create(),
        "etat_cmd_id" => factory('App\EtatCommande')->create(),
        "etat_livraison_id" => factory('App\EtatLivraison')->create(),
        "date_heur_souhaitee" => $faker->date("d-m-Y H:i:s", $max = 'now'),
        "date_heur_arrive_livr" => $faker->date("d-m-Y H:i:s", $max = 'now'),
    ];
});
