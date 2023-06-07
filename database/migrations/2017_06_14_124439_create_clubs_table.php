<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sport_id')->unsigned()->nullable();
            $table->integer('conference_id')->unsigned()->nullable();
            $table->integer('division_id')->unsigned()->nullable();
            $table->string('team');
            $table->string('initials');
            $table->string('city');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sport_id')->references('id')->on('sports')->default(1);
            $table->foreign('conference_id')->references('id')->on('conferences')->default(1);
            $table->foreign('division_id')->references('id')->on('divisions')->default(1);
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
        Schema::dropIfExists('clubs');
        Schema::enableForeignKeyConstraints();
    }
}
