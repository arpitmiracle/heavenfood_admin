<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryManWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_man_wallets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('delivery_man_id');
            $table->decimal('collected_cash',$precision = 24, $scale = 2)->default(0);
            $table->decimal('total_earning',$precision = 24, $scale = 2)->default(0);
            $table->decimal('total_withdrawn',$precision = 24, $scale = 2)->default(0);
            $table->decimal('pending_withdraw',$precision = 24, $scale = 2)->default(0);
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
        Schema::dropIfExists('delivery_man_wallets');
    }
}
