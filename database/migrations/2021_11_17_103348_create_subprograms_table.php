<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubprogramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subprograms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('program_id');
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->date('date_start');
            $table->date('date_end');
            $table->string('location');
            $table->string('partner')->nullable();
            $table->text('notes')->nullable();
            $table->double('budget')->nullable();
            $table->double('used')->nullable();
            $table->double('balance')->nullable();
            $table->unsignedInteger('total_male')->nullable();
            $table->unsignedInteger('total_female')->nullable();
            $table->unsignedInteger('range_age_1')->nullable(); //10-19
            $table->unsignedInteger('range_age_2')->nullable(); //20-29
            $table->unsignedInteger('range_age_3')->nullable(); //30-39
            $table->unsignedInteger('range_age_4')->nullable(); //40-49
            $table->unsignedInteger('range_age_5')->nullable(); //50-59
            $table->unsignedInteger('range_age_6')->nullable(); //60~
            $table->string('attachment')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('status', ['done', 'progress', 'soon']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subprograms');
    }
}
