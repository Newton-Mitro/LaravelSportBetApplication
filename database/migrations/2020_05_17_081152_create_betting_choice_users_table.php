<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBettingChoiceUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('betting_choice_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('sport_id');
            $table->bigInteger('match_id');
            $table->bigInteger('betting_question_id');
            $table->bigInteger('betting_choice_id');
            $table->double('amount');
            $table->float('wining_rate');
            $table->double('balance');
            $table->boolean('wining_status')->default(0);
            $table->boolean('calculation_status')->default(0);
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
        Schema::dropIfExists('betting_choice_users');
    }
}
