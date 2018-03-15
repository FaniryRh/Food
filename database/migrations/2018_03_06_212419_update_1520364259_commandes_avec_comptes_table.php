<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1520364259CommandesAvecComptesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commandes_avec_comptes', function (Blueprint $table) {
            
if (!Schema::hasColumn('commandes_avec_comptes', 'adresse_de_livraison')) {
                $table->string('adresse_de_livraison')->nullable();
                }
if (!Schema::hasColumn('commandes_avec_comptes', 'map_address')) {
                $table->string('map_address')->nullable();
                $table->double('map_latitude')->nullable();
                $table->double('map_longitude')->nullable();
                }
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commandes_avec_comptes', function (Blueprint $table) {
            $table->dropColumn('adresse_de_livraison');
            $table->dropColumn('map_address');
            $table->dropColumn('map_latitude');
            $table->dropColumn('map_longitude');
            
        });

    }
}
