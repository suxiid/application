<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimate_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estimate_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->string('item_description');
            $table->decimal('units', 10, 2);
            $table->decimal('rate', 10, 2);
            $table->decimal('labor_amount_final', 10, 2);
            $table->decimal('initial_amount', 10, 2);
            $table->integer('task_status');
            $table->timestamps();
            
            $table->foreign('estimate_id')->references('id')->on('estimates');
            $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('estimate_details');
    }
}
