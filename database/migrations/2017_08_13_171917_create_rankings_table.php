<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRankingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rankings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('week_id')->unsigned();
            $table->integer('correct')->nullable();
            $table->integer('diff')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->default(1);
            $table->foreign('week_id')->references('id')->on('weeks')->default(1);
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
        Schema::dropIfExists('rankings');
        Schema::enableForeignKeyConstraints();
    }
}
