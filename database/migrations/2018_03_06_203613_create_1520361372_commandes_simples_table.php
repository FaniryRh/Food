<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1520361372CommandesSimplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('commandes_simples')) {
            Schema::create('commandes_simples', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nom_client')->nullable();
                $table->string('adresse_client')->nullable();
                $table->string('phone_client')->nullable();
                $table->integer('total_addition')->nullable()->unsigned();
                $table->datetime('date_encaisse')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
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
        Schema::dropIfExists('commandes_simples');
    }
}
