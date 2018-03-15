<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5a9ef084ce171CouponCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('coupon_campaigns');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('coupon_campaigns')) {
            Schema::create('coupon_campaigns', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title')->nullable();
                $table->text('description')->nullable();
                $table->datetime('valid_from')->nullable();
                $table->datetime('valid_to')->nullable();
                $table->double('discount_amount', 15, 2)->nullable();
                $table->double('discount_percent', 15, 2)->nullable();
                $table->integer('coupons_amount')->nullable();
                
                $table->timestamps();
                
            });
        }
    }
}
