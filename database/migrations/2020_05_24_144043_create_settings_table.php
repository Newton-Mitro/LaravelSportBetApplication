<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site_title')->nullable();
            $table->string('logo')->nullable();
            $table->longText('headline')->default("|| Welcome To betwinbd.com || All Time Deposit All Time Withdraw || || Minimum Deposit 300/= And Maximum Deposit 25000/= || || Minimum Withdraw 500/= And Maximum Withdraw 15000/=|| || Open A New Club Contacts Our IMO Help Line || || Withdraw Accept Just 10-30 Minutes|| || Deposit Accept Just 01-10 Minutes ||");
            $table->double('max_bet')->default(5000);
            $table->double('min_bet')->default(20);
            $table->double('max_withdraw')->default(20000);
            $table->double('min_withdraw')->default(500);
            $table->boolean('withdraw_enable')->default(true);
            $table->double('max_deposit')->default(25000);
            $table->double('min_deposit')->default(300);
            $table->boolean('deposit_enable')->default(true);
            $table->double('bet_sale_commission_rate')->default(0.02);
            $table->double('club_commission_rate')->default(0.02);
            $table->double('club_min_transfer_amount')->default(1000);
            $table->double('reference_amount')->default(50);
            $table->double('opening_balance')->default(50);
            $table->string('phone',12)->default("01741-813377");
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
        Schema::dropIfExists('settings');
    }
}
