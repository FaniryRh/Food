<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5a9ee8f706671InventairesAvecCompteOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('inventaires_avec_compte_option')) {
            Schema::create('inventaires_avec_compte_option', function (Blueprint $table) {
                $table->integer('inventaires_avec_compte_id')->unsigned()->nullable();
                $table->foreign('inventaires_avec_compte_id', 'fk_p_126116_126098_option_5a9ee8f70676b')->references('id')->on('inventaires_avec_comptes')->onDelete('cascade');
                $table->integer('option_id')->unsigned()->nullable();
                $table->foreign('option_id', 'fk_p_126098_126116_invent_5a9ee8f706828')->references('id')->on('options')->onDelete('cascade');
                
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
        Schema::dropIfExists('inventaires_avec_compte_option');
    }
}
