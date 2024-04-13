<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('f_name',100)->nullable();
            $table->string('l_name',100)->nullable();
            $table->string('phone')->nullable();
            $table->string('email',100)->nullable();
            $table->string('image',100)->nullable();
            $table->boolean('status')->default(1)->nullable();
            $table->string('interest')->nullable();
            $table->integer('order_count')->default(0);
            $table->decimal('wallet_balance', 24, 3)->default(0);
            $table->decimal('loyalty_point', 24, 3)->default(0);
            $table->string('current_language_key')->default('en')->nullable();
            $table->string('ref_code', 10)->nullable()->unique();
            $table->boolean('is_phone_verified')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',100);
            $table->string('temp_token')->nullable();
            $table->string('login_medium', 191)->nullable();
            $table->string('social_id', 191)->nullable();
            $table->string('email_verification_token')->nullable();
            $table->string('cm_firebase_token')->nullable();
            $table->foreignId('zone_id')->nullable()->index();
            $table->unsignedBigInteger('ref_by')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
