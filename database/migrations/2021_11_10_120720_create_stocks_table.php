<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nursary_id');
            $table->foreign('nursary_id')->references('id')->on('nursaries')->onDelete('cascade');
            $table->date('date');
            $table->string('plant_type');
            $table->double('total_seeds');
            $table->double('total_healthly_seeds');
            $table->double('total_broken_seeds');
            $table->double('total_dead_seeds');
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
        Schema::dropIfExists('stocks');
    }
}
