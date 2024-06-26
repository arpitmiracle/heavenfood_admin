<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('title',191)->nullable();
            $table->string('code',100)->nullable();
            $table->date('start_date')->nullable();
            $table->date('expire_date')->nullable();
            $table->decimal('min_purchase')->default(0);
            $table->decimal('max_discount')->default(0);
            $table->decimal('discount')->default(0);
            $table->string('discount_type',15)->default('percentage');
            $table->string('coupon_type')->default('default');
            $table->integer('limit')->nullable();
            $table->boolean('status')->default(1);
            $table->string('data')->nullable();
            $table->decimal('min_purchase',$precision = 24, $scale = 2)->change();
            $table->decimal('max_discount',$precision = 24, $scale = 2)->change();
            $table->decimal('discount',$precision = 24, $scale = 2)->change();
            $table->string('code',15)->unique()->change();
            $table->bigInteger('total_uses')->nullable()->default(0);
            $table->string('created_by',50)->default('admin')->nullable();
            $table->string('customer_id')->default(json_encode(['all']))->nullable();
            $table->string('slug',255)->nullable();
            $table->foreignId('restaurant_id')->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
