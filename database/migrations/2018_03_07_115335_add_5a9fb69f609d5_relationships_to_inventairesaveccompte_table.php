<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5a9fb69f609d5RelationshipsToInventairesAvecCompteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventaires_avec_comptes', function(Blueprint $table) {
            if (!Schema::hasColumn('inventaires_avec_comptes', 'cmd_compt_id')) {
                $table->integer('cmd_compt_id')->unsigned()->nullable();
                $table->foreign('cmd_compt_id', '126116_5a9ee8f52e454')->references('id')->on('commandes_avec_comptes')->onDelete('cascade');
                }
                if (!Schema::hasColumn('inventaires_avec_comptes', 'produit_id')) {
                $table->integer('produit_id')->unsigned()->nullable();
                $table->foreign('produit_id', '126116_5a9ee8f536edf')->references('id')->on('produits')->onDelete('cascade');
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
        Schema::table('inventaires_avec_comptes', function(Blueprint $table) {
            
        });
    }
}
