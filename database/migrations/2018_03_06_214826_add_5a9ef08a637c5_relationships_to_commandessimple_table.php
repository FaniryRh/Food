<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5a9ef08a637c5RelationshipsToCommandesSimpleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commandes_simples', function(Blueprint $table) {
            if (!Schema::hasColumn('commandes_simples', 'user_id')) {
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', '126102_5a9edfa01668e')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('commandes_simples', 'etat_cmd_id')) {
                $table->integer('etat_cmd_id')->unsigned()->nullable();
                $table->foreign('etat_cmd_id', '126102_5a9edfa01fab3')->references('id')->on('etat_commandes')->onDelete('cascade');
                }
                if (!Schema::hasColumn('commandes_simples', 'etat_livraison_id')) {
                $table->integer('etat_livraison_id')->unsigned()->nullable();
                $table->foreign('etat_livraison_id', '126102_5a9edfa02851b')->references('id')->on('etat_livraisons')->onDelete('cascade');
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
        Schema::table('commandes_simples', function(Blueprint $table) {
            
        });
    }
}
