<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->string('location');
            $table->decimal('quantity', 10, 2);
            $table->decimal('sale_price', 10, 2);
            $table->string('unit_of_sale');
            $table->decimal('pre_order_level', 10, 2);
            $table->integer('category_id')->unsigned();
            $table->decimal('service_only_cost', 10, 2);
            $table->integer('created_by')->unsigned();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('item_categories');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('items');
    }
}
