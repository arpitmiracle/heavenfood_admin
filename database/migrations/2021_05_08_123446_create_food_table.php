<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('image',30)->nullable();
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
            $table->time('available_time_starts')->nullable();
            $table->time('available_time_ends')->nullable();
            $table->boolean('veg')->default(0);
            $table->boolean('status')->default(1);
            $table->foreignId('restaurant_id');
            $table->integer('maximum_cart_quantity')->nullable();
            $table->string('slug',255)->nullable();
            $table->boolean('recommended')->default(0);
            $table->float('avg_rating',16, 14)->default(0);
            $table->integer('rating_count')->default(0);
            $table->string('rating',255)->nullable();
            $table->integer('order_count')->default(0);
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
        Schema::dropIfExists('food');
    }
}
