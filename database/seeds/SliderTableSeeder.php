<?php

use Illuminate\Database\Seeder;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert([
            'image' => asset('dist/img/1.jpg'),
            'title' => "Withdraw Accept Just 10-30 Minutes",
            'subtitle' => "Withdraw Limit 500/= 15000/=",
            'button_link' => "user/withdraw/create",
            'button_title' => "Withdraw",
        ]);

        DB::table('sliders')->insert([
            'image' => asset('dist/img/2.jpg'),
            'title' => "Deposit Accept Just 01-10 Minutes",
            'subtitle' => "Deposit Limit 300/= 25000/=",
            'button_link' => "user/deposit/create",
            'button_title' => "Deposit",
        ]);

        DB::table('sliders')->insert([
            'image' => asset('dist/img/3.jpg'),
            'title' => "Welcome To betwinbd.com",
            'subtitle' => "Help Line IMO",
            'button_link' => "user/bets",
            'button_title' => "Betting History",
        ]);
    }
}
