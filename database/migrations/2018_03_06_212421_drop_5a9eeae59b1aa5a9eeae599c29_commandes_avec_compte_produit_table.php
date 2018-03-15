<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5a9eeae59b1aa5a9eeae599c29CommandesAvecCompteProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('commandes_avec_compte_produit');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('commandes_avec_compte_produit')) {
            Schema::create('commandes_avec_compte_produit', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('commandes_avec_compte_id')->unsigned()->nullable();
            $table->foreign('commandes_avec_compte_id', 'fk_p_126108_125925_produi_5a9ee2260a44f')->references('id')->on('commandes_avec_comptes');
                $table->integer('produit_id')->unsigned()->nullable();
            $table->foreign('produit_id', 'fk_p_125925_126108_comman_5a9ee22609b52')->references('id')->on('produits');
                
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
