<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5a9ef07a4700bCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('coupons');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
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
}
