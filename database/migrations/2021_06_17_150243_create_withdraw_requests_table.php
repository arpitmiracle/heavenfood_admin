<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraw_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->nullable();
            $table->foreignId('admin_id')->nullable();
            $table->string('transaction_note');
            $table->decimal('amount',23,3)->default(0);
            $table->boolean('approved')->default(0);
            $table->string('type',20)->default('manual');
            $table->foreignId('delivery_man_id')->nullable();
            $table->foreignId('withdrawal_method_id')->nullable();
            $table->json('withdrawal_method_fields')->nullable();
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
        Schema::dropIfExists('withdraw_requests');
    }
}
