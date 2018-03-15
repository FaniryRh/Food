<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5a9ee5b2bf8b1OptionProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('option_produit')) {
            Schema::create('option_produit', function (Blueprint $table) {
                $table->integer('option_id')->unsigned()->nullable();
                $table->foreign('option_id', 'fk_p_126098_125925_produi_5a9ee5b2bf980')->references('id')->on('options')->onDelete('cascade');
                $table->integer('produit_id')->unsigned()->nullable();
                $table->foreign('produit_id', 'fk_p_125925_126098_option_5a9ee5b2bf9fe')->references('id')->on('produits')->onDelete('cascade');
                
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
        Schema::dropIfExists('option_produit');
    }
}
