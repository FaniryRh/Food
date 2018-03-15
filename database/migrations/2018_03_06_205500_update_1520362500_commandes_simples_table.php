<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1520362500CommandesSimplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commandes_simples', function (Blueprint $table) {
            
if (!Schema::hasColumn('commandes_simples', 'date_heur_souhaitee')) {
                $table->datetime('date_heur_souhaitee')->nullable();
                }
if (!Schema::hasColumn('commandes_simples', 'date_heur_arrive_livr')) {
                $table->datetime('date_heur_arrive_livr')->nullable();
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
        Schema::table('commandes_simples', function (Blueprint $table) {
            $table->dropColumn('date_heur_souhaitee');
            $table->dropColumn('date_heur_arrive_livr');
            
        });

    }
}
