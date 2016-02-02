<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estimate_id')->unsigned();
            $table->date('promised_date');
            $table->integer('s_adviser')->unsigned();
            $table->string('status');
            $table->text('remarks');
            $table->integer('tested_by')->unsigned();
            $table->integer('section_incharge')->unsigned();
            $table->integer('created_by')->unsigned();
            $table->timestamps();

            $table->foreign('estimate_id')->references('id')->on('estimates');
            $table->foreign('s_adviser')->references('id')->on('users');
            $table->foreign('tested_by')->references('id')->on('users');
            $table->foreign('section_incharge')->references('id')->on('users');
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
        Schema::drop('jobs');
    }
}
