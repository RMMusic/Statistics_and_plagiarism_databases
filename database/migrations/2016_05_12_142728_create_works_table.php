<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('participant_id')->nullable();
            $table->foreign('participant_id')->references('id')->on('participants');
            $table->string('work_them')->nullable();
            $table->unsignedInteger('job_type_id')->nullable();
            $table->foreign('job_type_id')->references('id')->on('job_types');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->unsignedInteger('work_type_id')->nullable();
            $table->foreign('work_type_id')->references('id')->on('work_types');
            $table->unsignedInteger('work_status_id')->nullable();
            $table->foreign('work_status_id')->references('id')->on('work_status');
            $table->integer('plagiarism_percent')->nullable();
            $table->integer('errors_percent')->nullable();
            $table->string('comment')->nullable();
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
        Schema::drop('works');
    }
}
