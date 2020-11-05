<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBettingChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('betting_choices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('betting_question_id')->nullable();
            $table->string('choice_name');
            $table->boolean('can_place_bet')->default(1);
            $table->float('wining_rate');
            $table->integer('min_stake')->nullable();
            $table->integer('max_stake')->nullable();
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
        Schema::dropIfExists('betting_choices');
    }
}
