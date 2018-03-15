<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5a9edfa1e6e56CommandesSimpleProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('commandes_simple_produit')) {
            Schema::create('commandes_simple_produit', function (Blueprint $table) {
                $table->integer('commandes_simple_id')->unsigned()->nullable();
                $table->foreign('commandes_simple_id', 'fk_p_126102_125925_produi_5a9edfa1e6f2f')->references('id')->on('commandes_simples')->onDelete('cascade');
                $table->integer('produit_id')->unsigned()->nullable();
                $table->foreign('produit_id', 'fk_p_125925_126102_comman_5a9edfa1e6fb2')->references('id')->on('produits')->onDelete('cascade');
                
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
        Schema::dropIfExists('commandes_simple_produit');
    }
}
