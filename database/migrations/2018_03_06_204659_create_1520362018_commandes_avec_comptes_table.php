<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1520362018CommandesAvecComptesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('commandes_avec_comptes')) {
            Schema::create('commandes_avec_comptes', function (Blueprint $table) {
                $table->increments('id');
                $table->datetime('date_depot_cmd')->nullable();
                $table->datetime('date_livre_cmd')->nullable();
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
        Schema::dropIfExists('commandes_avec_comptes');
    }
}
