<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zones', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->polygon('coordinates')->nullable();
            $table->string('restaurant_wise_topic')->nullable();
            $table->string('customer_wise_topic')->nullable();
            $table->string('deliveryman_wise_topic')->nullable();
            $table->double('minimum_shipping_charge',16, 3, true)->nullable();
            $table->double('per_km_shipping_charge',16, 3, true)->nullable();
            $table->string('increase_delivery_charge_message')->nullable();
            $table->double('increased_delivery_fee',8,2)->default('0');
            $table->boolean('increased_delivery_fee_status')->default('0');
            $table->double('max_cod_order_amount', 23, 3)->nullable();
            $table->double('maximum_shipping_charge', 23, 3)->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('zones');
    }
}
