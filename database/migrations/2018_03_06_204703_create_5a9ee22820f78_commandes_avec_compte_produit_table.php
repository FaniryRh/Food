<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5a9ee22820f78CommandesAvecCompteProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('commandes_avec_compte_produit')) {
            Schema::create('commandes_avec_compte_produit', function (Blueprint $table) {
                $table->integer('commandes_avec_compte_id')->unsigned()->nullable();
                $table->foreign('commandes_avec_compte_id', 'fk_p_126108_125925_produi_5a9ee22821058')->references('id')->on('commandes_avec_comptes')->onDelete('cascade');
                $table->integer('produit_id')->unsigned()->nullable();
                $table->foreign('produit_id', 'fk_p_125925_126108_comman_5a9ee228210d6')->references('id')->on('produits')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes_avec_compte_produit');
    }
}
