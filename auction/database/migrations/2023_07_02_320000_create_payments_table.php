<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('payment_id');//primary key
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('item_id');
            $table->unsignedFloat('amount');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();

           
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('item_id')->references('item_id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
