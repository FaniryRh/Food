<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5a9ee814b74b4RelationshipsToInventairesSimpleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventaires_simples', function(Blueprint $table) {
            if (!Schema::hasColumn('inventaires_simples', 'produit_id')) {
                $table->integer('produit_id')->unsigned()->nullable();
                $table->foreign('produit_id', '126115_5a9ee812f16ab')->references('id')->on('produits')->onDelete('cascade');
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
        Schema::table('inventaires_simples', function(Blueprint $table) {
            
        });
    }
}
