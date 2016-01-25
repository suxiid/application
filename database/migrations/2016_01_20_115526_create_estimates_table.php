<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('vehicle_id')->unsigned();
            $table->integer('mileage_in');
            $table->integer('net_amount');
            $table->integer('parent_estimate_id')->unsigned();
            $table->integer('department')->unsigned();
            $table->integer('created_by')->unsigned();
            $table->timestamps();
            
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            //$table->foreign('parent_estimate_id')->references('id')->on('estimates');
            $table->foreign('department')->references('id')->on('departments');
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
        Schema::drop('estimates');
    }
}
