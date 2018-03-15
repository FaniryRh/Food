<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5a9ef028042d5RelationshipsToCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coupons', function(Blueprint $table) {
            if (!Schema::hasColumn('coupons', 'campaign_id')) {
                $table->integer('campaign_id')->unsigned()->nullable();
                $table->foreign('campaign_id', '126144_5a9ef02628db5')->references('id')->on('coupon_campaigns')->onDelete('cascade');
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
        Schema::table('coupons', function(Blueprint $table) {
            
        });
    }
}
