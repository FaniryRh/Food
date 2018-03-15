<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5a9ee957440f6RelationshipsToInventairesSimpleTable extends Migration
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
                if (!Schema::hasColumn('inventaires_simples', 'cmd_simpl_id')) {
                $table->integer('cmd_simpl_id')->unsigned()->nullable();
                $table->foreign('cmd_simpl_id', '126115_5a9ee955553c8')->references('id')->on('commandes_simples')->onDelete('cascade');
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
