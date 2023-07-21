<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('item_id');//primary key
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('seller_id');
            $table->string('item_name',50);
            $table->float('item_startprice',50);
            $table->time('item_starttime');
            $table->time('item_endtime');
            $table->text('description');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('images');
            $table->timestamps();

           
            $table->foreign('category_id')->references('category_id')->on('category');
            $table->foreign('seller_id')->references('seller_id')->on('seller');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
