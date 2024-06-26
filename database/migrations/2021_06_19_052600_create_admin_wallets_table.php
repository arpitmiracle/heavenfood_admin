<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_wallets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id');
            $table->decimal('total_commission_earning',$precision = 24, $scale = 2)->default(0);
            $table->decimal('digital_received',$precision = 24, $scale = 2)->default(0);
            $table->decimal('manual_received',$precision = 24, $scale = 2)->default(0);
            $table->decimal('delivery_charge',24, 2)->default(0);
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
        Schema::dropIfExists('admin_wallets');
    }
}
