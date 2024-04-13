<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone',20)->unique();
            $table->string('email',100)->nullable();
            $table->string('logo')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->text('address')->nullable();
            $table->text('footer_text')->nullable();
            $table->string('rating')->nullable();
            $table->decimal('minimum_order', $precision = 24, $scale = 2)->default(0);
            $table->decimal('comission', $precision = 24, $scale = 2)->default(null);
            $table->string('currency',100)->default('BDT');
            $table->time('opening_time')->default('10:00:00')->nullable();
            $table->time('closeing_time')->default('23:00:00')->nullable();
            $table->boolean('free_delivery')->default(0);
            $table->boolean('status')->default(1);
            $table->foreignId('vendor_id');
            $table->boolean('order_subscription_active')->default(0)->nullable();
            $table->boolean('active')->default(1);
            $table->string('off_day')->default(' ');
            $table->string('gst')->nullable();
            $table->boolean('reviews_section')->default(1);
            $table->dropColumn('currency');
            $table->string('cover_photo')->nullable();
            $table->foreignId('zone_id')->nullable();
            $table->decimal('tax', $precision = 24, $scale = 2)->default(0);
            $table->boolean('schedule_order')->default(0);
            $table->boolean('food_section')->default(1);
            $table->boolean('delivery')->default(1);
            $table->boolean('take_away')->default(1);
            $table->double('maximum_shipping_charge', 23, 3)->nullable();
            $table->string('restaurant_model', 50)->default('commission')->nullable();
            $table->decimal('minimum_shipping_charge',$precision = 24, $scale = 2)->default(0);
            $table->double('per_km_shipping_charge',16, 3, true)->nullable();
            $table->integer('order_count')->unsigned()->default(0);
            $table->integer('total_order')->unsigned()->default(0);
            $table->boolean('veg')->default(true);
            $table->boolean('non_veg')->default(true);
            $table->string('delivery_time', 191)->nullable()->default('30-40');
            $table->boolean('self_delivery_system')->default(0);
            $table->boolean('pos_system')->default(0);
            $table->string('slug',255)->nullable();
            $table->string('meta_title',100)->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_image',100)->nullable();
            $table->text('additional_data')->nullable();
            $table->text('additional_documents')->nullable();
            $table->string('free_delivery_distance')->nullable();
            $table->text('qr_code')->nullable();
            $table->boolean('announcement')->default(0);
            $table->string('announcement_message')->nullable();
            $table->boolean('cutlery')->default(0);
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
        Schema::dropIfExists('restaurants');
    }
}
