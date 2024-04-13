<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_id')->nullable();
            $table->foreignId('order_id')->nullable();
            $table->foreignId('item_campaign_id')->nullable();
            $table->decimal('price',$precision = 24, $scale = 2)->default(0);
            $table->text('food_details')->nullable();
            $table->string('variation')->nullable();
            $table->string('add_ons')->nullable();
            $table->decimal('discount_on_food',$precision = 24, $scale = 2)->nullable();
            $table->string('discount_type',20)->default('amount');
            $table->integer('quantity')->default(1);
            $table->decimal('tax_amount',$precision = 24, $scale = 2)->default(1);
            $table->text('variant')->nullable();
            $table->decimal('total_add_on_price',$precision = 24, $scale = 2)->default(0.00);
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
        Schema::dropIfExists('order_details');
    }
}
