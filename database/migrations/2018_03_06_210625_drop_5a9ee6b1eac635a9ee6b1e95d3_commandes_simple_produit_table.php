<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5a9ee6b1eac635a9ee6b1e95d3CommandesSimpleProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('commandes_simple_produit');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('commandes_simple_produit')) {
            Schema::create('commandes_simple_produit', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('commandes_simple_id')->unsigned()->nullable();
            $table->foreign('commandes_simple_id', 'fk_p_126102_125925_produi_5a9edfa00cdf2')->references('id')->on('commandes_simples');
                $table->integer('produit_id')->unsigned()->nullable();
            $table->foreign('produit_id', 'fk_p_125925_126102_comman_5a9edfa00c47b')->references('id')->on('produits');
                
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }
}
