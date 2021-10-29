<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedInteger('total_male')->nullable();
            $table->unsignedInteger('total_female')->nullable();
            $table->unsignedInteger('range_age_1')->nullable(); //10-15
            $table->unsignedInteger('range_age_2')->nullable(); //16-20
            $table->unsignedInteger('range_age_3')->nullable(); //21-30
            $table->unsignedInteger('range_age_4')->nullable(); //31-50
            $table->unsignedInteger('range_age_5')->nullable(); //51-70
            $table->double('budget')->nullable();
            $table->double('used')->nullable();
            $table->double('balance')->nullable();
            $table->string('attachment')->nullable();
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
        Schema::dropIfExists('programs');
    }
}
