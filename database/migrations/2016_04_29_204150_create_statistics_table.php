<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date');
            $table->string('names');
//            $table->unsignedInteger('work_types_id')->nullable();
//            $table->foreign('work_types_id')->references('id')->on('statistics_work_types');
//            $table->unsignedInteger('result_types_id')->nullable();
//            $table->foreign('result_types_id')->references('id')->on('statistics_result_types');

            $table->integer('work_types_id')->nullable();
            $table->integer('result_types_id')->nullable();

            $table->date('end_date')->nullable();
            $table->integer('phones')->nullable();
            $table->string('comments', 1000)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('statistics');
    }
}
