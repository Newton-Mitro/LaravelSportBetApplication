<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sport_id');
            $table->string('title');
            $table->bigInteger('contestant_one');
            $table->bigInteger('contestant_two');
            $table->Integer('contestant_one_score')->default(0);
            $table->Integer('contestant_two_score')->default(0);
            $table->string('description')->nullable();
            $table->date('start_date')->nullable();
            $table->time('start_time')->nullable();
            $table->boolean('can_place_bet')->default(1);
            $table->boolean('is_open')->default(1);
            $table->bigInteger('status_id')->default(1);
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
        Schema::dropIfExists('matches');
    }
}
