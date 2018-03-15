<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1520365604CouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('coupons')) {
            Schema::create('coupons', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('code')->nullable();
                $table->datetime('valid_from')->nullable();
                $table->datetime('valid_to')->nullable();
                $table->double('discount_amount', 15, 2)->nullable();
                $table->double('discount_percent', 15, 2)->nullable();
                $table->datetime('redeem_time')->nullable();
                
                $table->timestamps();
                
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
        Schema::dropIfExists('coupons');
    }
}
