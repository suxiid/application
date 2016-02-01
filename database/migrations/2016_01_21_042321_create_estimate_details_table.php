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
            $table->integer('units');
            $table->integer('rate');
            $table->string('labor_amount_final');
            $table->integer('initial_amount');
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
