<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlagiarismTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plagiarism', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date');
            $table->string('names');
//            $table->unsignedInteger('work_types_id')->nullable();
//            $table->foreign('work_types_id')->references('id')->on('plagiarism_work_types');

            $table->unsignedInteger('work_types_id')->nullable();

            $table->integer('plagiarism_results')->nullable();
            $table->integer('error_results')->nullable();
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
        Schema::drop('plagiarism');
    }
}
