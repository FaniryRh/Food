<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1520346049ComptesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('comptes')) {
            Schema::create('comptes', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nom_compte')->nullable();
                $table->string('prenom_compte')->nullable();
                $table->string('phone_compte')->nullable();
                $table->string('mail_compte')->nullable();
                $table->string('mdp_compte')->nullable();
                $table->string('adresse_compte')->nullable();
                $table->string('ville_compte')->nullable();
                $table->string('quartier_compte')->nullable();
                $table->integer('solde_compte')->nullable()->unsigned();
                
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
        Schema::dropIfExists('comptes');
    }
}
