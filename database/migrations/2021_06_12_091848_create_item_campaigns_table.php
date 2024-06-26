<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('title',191)->nullable();
            $table->string('image',100)->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(1);
            $table->foreignId('admin_id');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->string('category_ids',255)->nullable();
            $table->text('variations')->nullable();
            $table->string('add_ons')->nullable();
            $table->string('attributes',255)->nullable();
            $table->text('choice_options')->nullable();
            $table->decimal('price',$precision = 24, $scale = 2)->default(0);
            $table->decimal('tax',$precision = 24, $scale = 2)->default(0);
            $table->string('tax_type',20)->default('percent');
            $table->decimal('discount',$precision = 24, $scale = 2)->default(0);
            $table->string('discount_type',20)->default('percent');
            $table->foreignId('restaurant_id');
            $table->integer('maximum_cart_quantity')->nullable();
            $table->string('slug',255)->nullable();
            $table->boolean('veg')->default(false);
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
        Schema::dropIfExists('item_campaigns');
    }
}
