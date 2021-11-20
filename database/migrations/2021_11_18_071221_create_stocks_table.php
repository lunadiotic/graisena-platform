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
            $table->unsignedBigInteger('nursery_id');
            $table->foreign('nursery_id')->references('id')->on('nurseries')->onDelete('cascade');
            $table->unsignedBigInteger('seed_id');
            $table->foreign('seed_id')->references('id')->on('seeds')->onDelete('cascade');
            $table->date('date_check');
            $table->unsignedBigInteger('seed_good');
            $table->unsignedBigInteger('seed_broken');
            $table->unsignedBigInteger('seed_death');
            $table->unsignedBigInteger('seed_out');
            $table->unsignedBigInteger('total_seed');
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
