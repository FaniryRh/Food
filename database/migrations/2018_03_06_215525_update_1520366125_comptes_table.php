<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1520366125ComptesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comptes', function (Blueprint $table) {
            if(Schema::hasColumn('comptes', 'mdp_compte')) {
                $table->dropColumn('mdp_compte');
            }
            
        });
Schema::table('comptes', function (Blueprint $table) {
            
if (!Schema::hasColumn('comptes', 'mdp_compte')) {
                $table->string('mdp_compte')->nullable();
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
        Schema::table('comptes', function (Blueprint $table) {
            $table->dropColumn('mdp_compte');
            
        });
Schema::table('comptes', function (Blueprint $table) {
                        $table->string('mdp_compte')->nullable();
                
        });

    }
}
