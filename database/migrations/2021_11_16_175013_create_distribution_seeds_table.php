<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributionSeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribution_seeds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('distribution_id');
            $table->foreign('distribution_id')->references('id')->on('distributions')->onDelete('cascade');
            $table->unsignedBigInteger('seed_id');
            $table->foreign('seed_id')->references('id')->on('seeds')->onDelete('cascade');
            $table->unsignedBigInteger('total');
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
        Schema::dropIfExists('distribution_seeds');
    }
}
