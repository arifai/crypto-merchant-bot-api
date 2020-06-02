<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
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
            $table->integer('chat_id')->unique();
            $table->string('firstname', 128);
            $table->string('lastname', 128)->nullable();
            $table->string('username', 128)->nullable();
            $table->string('email', 128)->nullable()->unique();
            $table->decimal('balance', 12, 2)->default(0.0);
            $table->integer('point')->default(0);
            $table->integer('activation_code')->nullable();
            $table->boolean('is_activated')->default(false);
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
