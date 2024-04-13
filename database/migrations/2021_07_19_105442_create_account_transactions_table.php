<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('from_type');
            $table->bigInteger('from_id');
            $table->decimal('current_balance',$precision = 24, $scale = 2);
            $table->decimal('amount',$precision = 24, $scale = 2);
            $table->string('method');
            $table->string('ref')->nullable();
            $table->string('type',20)->default('collected');
            $table->string('created_by',20)->default('admin');
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
        Schema::dropIfExists('account_transactions');
    }
}
