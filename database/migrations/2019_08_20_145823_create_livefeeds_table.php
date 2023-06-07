<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivefeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livefeeds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('week_id')->unsigned()->nullable();
            $table->integer('hometeam_id')->unsigned()->nullable();
            $table->integer('awayteam_id')->unsigned()->nullable();
            $table->dateTime('game_start');
            $table->tinyInteger('home_score')->nullable();
            $table->tinyInteger('away_score')->nullable();
            $table->boolean('tiebreaker')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('week_id')->references('id')->on('weeks')->default(1);
            $table->foreign('hometeam_id')->references('id')->on('clubs')->default(1);
            $table->foreign('awayteam_id')->references('id')->on('clubs')->default(1);
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
        Schema::dropIfExists('livefeeds');
        Schema::enableForeignKeyConstraints();
    }
}
