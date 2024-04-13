<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryMenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_men', function (Blueprint $table) {
            $table->id();
            $table->string('f_name',100)->nullable();
            $table->string('l_name',100)->nullable();
            $table->string('phone',20)->unique();
            $table->string('email',100)->nullable();
            $table->string('identity_number',30)->nullable();
            $table->string('identity_type',50)->nullable();
            $table->string('identity_image')->nullable();
            $table->string('image',100)->nullable();
            $table->string('password',100);
            $table->boolean('earning')->default(1);
            $table->string('auth_token')->nullable();
            $table->string('fcm_token')->nullable();
            $table->bigInteger('zone_id')->default(null);
            $table->text('additional_data')->nullable();
            $table->text('additional_documents')->nullable();
            $table->foreignId('shift_id')->nullable();
            $table->string('type')->default('zone_wise');
            $table->bigInteger('restaurant_id')->nullable();
            $table->foreignId('vehicle_id')->nullable();
            $table->integer('order_count')->unsigned()->default(0);
            $table->integer('assigned_order_count')->unsigned()->default(0);
            $table->enum('application_status', ['approved', 'denied','pending'])->default('approved');
            $table->integer('current_orders')->default(0);
            $table->boolean('status')->default(1);
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('delivery_men');
    }
}
