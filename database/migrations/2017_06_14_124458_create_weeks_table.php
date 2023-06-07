<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weeks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('season_id')->unsigned()->nullable();
            $table->tinyInteger('week_number');
            $table->dateTime('start_timestamp');
            $table->dateTime('end_timestamp')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('season_id')->references('id')->on('seasons')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('weeks');
        Schema::enableForeignKeyConstraints();
    }
}
