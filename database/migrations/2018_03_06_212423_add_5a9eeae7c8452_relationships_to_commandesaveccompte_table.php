<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5a9eeae7c8452RelationshipsToCommandesAvecCompteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commandes_avec_comptes', function(Blueprint $table) {
            if (!Schema::hasColumn('commandes_avec_comptes', 'compte_id')) {
                $table->integer('compte_id')->unsigned()->nullable();
                $table->foreign('compte_id', '126108_5a9ee2261439c')->references('id')->on('comptes')->onDelete('cascade');
                }
                if (!Schema::hasColumn('commandes_avec_comptes', 'user_id')) {
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', '126108_5a9ee2261ea8a')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('commandes_avec_comptes', 'etat_cmd_id')) {
                $table->integer('etat_cmd_id')->unsigned()->nullable();
                $table->foreign('etat_cmd_id', '126108_5a9ee22628cb7')->references('id')->on('etat_commandes')->onDelete('cascade');
                }
                if (!Schema::hasColumn('commandes_avec_comptes', 'typepayement_id')) {
                $table->integer('typepayement_id')->unsigned()->nullable();
                $table->foreign('typepayement_id', '126108_5a9ee226329a9')->references('id')->on('typepayements')->onDelete('cascade');
                }
                if (!Schema::hasColumn('commandes_avec_comptes', 'etat_livraison_id')) {
                $table->integer('etat_livraison_id')->unsigned()->nullable();
                $table->foreign('etat_livraison_id', '126108_5a9ee2263bfd8')->references('id')->on('etat_livraisons')->onDelete('cascade');
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
        Schema::table('commandes_avec_comptes', function(Blueprint $table) {
            
        });
    }
}
