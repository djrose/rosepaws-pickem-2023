<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('week_id')->unsigned()->nullable();
            $table->tinyInteger('correct');
            $table->json('winning_users')->nullable();
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('calculations');
        Schema::enableForeignKeyConstraints();
    }
}
