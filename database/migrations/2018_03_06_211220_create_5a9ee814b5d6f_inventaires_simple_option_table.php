<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5a9ee814b5d6fInventairesSimpleOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('inventaires_simple_option')) {
            Schema::create('inventaires_simple_option', function (Blueprint $table) {
                $table->integer('inventaires_simple_id')->unsigned()->nullable();
                $table->foreign('inventaires_simple_id', 'fk_p_126115_126098_option_5a9ee814b5e6d')->references('id')->on('inventaires_simples')->onDelete('cascade');
                $table->integer('option_id')->unsigned()->nullable();
                $table->foreign('option_id', 'fk_p_126098_126115_invent_5a9ee814b5eeb')->references('id')->on('options')->onDelete('cascade');
                
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
        Schema::dropIfExists('inventaires_simple_option');
    }
}
