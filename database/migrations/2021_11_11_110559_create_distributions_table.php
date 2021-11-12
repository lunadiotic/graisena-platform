<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nursary_id');
            $table->foreign('nursary_id')->references('id')->on('nursaries')->onDelete('cascade');
            $table->string('location');
            $table->string('partner');
            $table->string('name_activity');
            $table->string('type_seed');
            $table->double('total_seed');
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
        Schema::dropIfExists('distributions');
    }
}
