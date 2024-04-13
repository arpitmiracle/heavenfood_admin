<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id');
            $table->foreignId('delivery_man_id')->nullable();
            $table->foreignId('order_id');
            $table->decimal('order_amount',$precision = 24, $scale = 2);
            $table->decimal('restaurant_amount',$precision = 24, $scale = 2);
            $table->decimal('admin_commission',$precision = 24, $scale = 2);
            $table->string('received_by');
            $table->decimal('delivery_charge',$precision = 24, $scale = 2)->default(0);
            $table->string('status')->nullable();
            $table->double('additional_charge',23, 3)->default(0);
            $table->boolean('is_subscription')->default(0)->nullable();
            $table->double('discount_amount_by_restaurant',23, 3)->default(0)->nullable();
            $table->decimal('original_delivery_charge',$precision = 24, $scale = 2)->default(0);
            $table->double('commission_percentage',16, 3)->default(0)->nullable();
            $table->boolean('is_subscribed')->default(0);
            $table->double('restaurant_expense', 23, 3)->default(0)->nullable();
            $table->decimal('admin_expense', 23, 3)->default(0)->nullable();
            $table->decimal('tax',$precision = 24, $scale = 2)->default(0);
            $table->double('dm_tips', 24, 2)->default(0);
            $table->double('delivery_fee_comission',24, 2)->default('0');
            $table->foreignId('zone_id')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_transactions');
    }
}
