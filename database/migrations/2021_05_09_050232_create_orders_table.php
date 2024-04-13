<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->decimal('order_amount')->default(0);
            $table->decimal('coupon_discount_amount')->default(0);
            $table->string('coupon_discount_title')->nullable();
            $table->string('payment_status')->default('unpaid');
            $table->string('order_status')->default('pending');
            $table->decimal('total_tax_amount')->default(0);
            $table->string('payment_method',30)->nullable();
            $table->string('transaction_reference',30)->nullable();
            $table->bigInteger('delivery_address_id')->nullable();
            $table->foreignId('delivery_man_id')->nullable();
            $table->string('coupon_code')->nullable();
            $table->text('order_note')->nullable();
            $table->string('order_type')->default('delivery');
            $table->boolean('checked')->default(0);
            $table->foreignId('restaurant_id');
            $table->foreignId('subscription_id')->nullable();
            $table->timestamp('schedule_at', $precision = 0)->nullable();
            $table->decimal('delivery_charge', $precision = 6, $scale = 2)->default(0);
            $table->string('callback')->nullable();
            $table->string('otp')->nullable();
            $table->string('discount_on_product_by',50)->default('vendor');
            $table->timestamp('pending')->nullable();
            $table->timestamp('accepted')->nullable();
            $table->timestamp('confirmed')->nullable();
            $table->timestamp('processing')->nullable();
            $table->timestamp('handover')->nullable();
            $table->timestamp('picked_up')->nullable();
            $table->timestamp('delivered')->nullable();
            $table->timestamp('canceled')->nullable();
            $table->timestamp('refund_requested')->nullable();
            $table->timestamp('refunded')->nullable();
            $table->string('delivery_address')->nullable();
            $table->boolean('scheduled')->default(0);
            $table->decimal('adjusment')->default(0);
            $table->boolean('edited')->default(0);
            $table->decimal('restaurant_discount_amount')->defaul(0.00);
            $table->decimal('original_delivery_charge', $precision = 8, $scale = 2)->default(0);
            $table->foreignId('zone_id')->nullable();
            $table->timestamp('failed')->nullable();
            $table->text('delivery_address')->nullable()->change();
            $table->string('transaction_reference',191)->nullable()->change();
            $table->double('dm_tips', 24, 2)->default(0);
            $table->decimal('order_amount',$precision = 24, $scale = 2)->change(); 
            $table->decimal('coupon_discount_amount',$precision = 24, $scale = 2)->change(); 
            $table->decimal('total_tax_amount',$precision = 24, $scale = 2)->change(); 
            $table->decimal('delivery_charge',$precision = 24, $scale = 2)->change(); 
            $table->decimal('restaurant_discount_amount',$precision = 24, $scale = 2)->change(); 
            $table->decimal('original_delivery_charge',$precision = 24, $scale = 2)->change(); 
            $table->decimal('adjusment',$precision = 24, $scale = 2)->change(); 
            $table->string('processing_time',10)->nullable();
            $table->string('free_delivery_by')->nullable();
            $table->timestamp('refund_request_canceled')->nullable();
            $table->string('cancellation_reason', 255)->nullable();
            $table->string('canceled_by',50)->nullable();
            $table->string('tax_status',50)->nullable();
            $table->string('coupon_created_by',50)->nullable();
            $table->foreignId('vehicle_id')->nullable();
            $table->double('tax_percentage', 24, 3)->nullable();
            $table->text('delivery_instruction')->nullable();
            $table->string('unavailable_item_note', 255)->nullable();
            $table->boolean('cutlery')->default(0);
            $table->double('distance', 23, 3)->default(0)->nullable();
            $table->text('cancellation_note')->nullable();
            $table->double('additional_charge',23, 3)->default(0);
            $table->double('partially_paid_amount',23, 3)->default(0);
            $table->string('order_proof')->nullable();
            $table->boolean('is_guest')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
