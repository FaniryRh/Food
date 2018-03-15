<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5aaa80072d560RelationshipsToProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produits', function(Blueprint $table) {
            if (!Schema::hasColumn('produits', 'categorie_id')) {
                $table->integer('categorie_id')->unsigned()->nullable();
                $table->foreign('categorie_id', '125925_5aaa8003ca3b0')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::table('produits', function(Blueprint $table) {
            
        });
    }
}
