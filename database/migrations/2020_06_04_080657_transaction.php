<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('buyer_email', 128);
            $table->string('invoice')->unique();
            $table->string('item_name');
            $table->string('currency1', 50);
            $table->string('currency2', 50);
            $table->bigInteger('amount');
            $table->string('address');
            $table->string('status', 128)->comment('0: pending, 1: success, 2: expired');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
