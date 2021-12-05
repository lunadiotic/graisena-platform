<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('identity_number');
            $table->string('name');
            $table->enum('gender', ['m', 'f']);
            $table->date('date_of_birth');
            $table->enum('status_of_marital', ['s', 'm', 'd', 'w'])->default('s');
            $table->enum('status_of_job', ['s', 'w', 'n'])->default('n');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('regency_id');
            $table->string('address');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('media_social')->nullable();
            $table->string('affiliate')->nullable();
            $table->string('skill')->nullable();
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('volunteers');
    }
}
