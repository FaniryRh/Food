<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1520362711CommandesAvecComptesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commandes_avec_comptes', function (Blueprint $table) {
            
if (!Schema::hasColumn('commandes_avec_comptes', 'date_souhaitee')) {
                $table->string('date_souhaitee')->nullable();
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
        Schema::table('commandes_avec_comptes', function (Blueprint $table) {
            $table->dropColumn('date_souhaitee');
            
        });

    }
}
