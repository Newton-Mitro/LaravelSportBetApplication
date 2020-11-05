<?php

use Illuminate\Database\Seeder;

class TransactonTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_types')->insert([ //1
            'name' => "Withdraw",
        ]);
        DB::table('transaction_types')->insert([ //2
            'name' => "Deposit",
        ]);
        DB::table('transaction_types')->insert([ //3
            'name' => "Winning Bet",
        ]);
        DB::table('transaction_types')->insert([ //4
            'name' => "Losing Bet",
        ]);
        DB::table('transaction_types')->insert([ //5
            'name' => "Place Bet",
        ]);
        DB::table('transaction_types')->insert([ //6
            'name' => "Losing Game",
        ]);
        DB::table('transaction_types')->insert([ //7
            'name' => "Winning Game",
        ]);
        DB::table('transaction_types')->insert([ //8
            'name' => "Club Balance Transfer",
        ]);
        DB::table('transaction_types')->insert([ //9
            'name' => "Balance Transfer",
        ]);
        DB::table('transaction_types')->insert([ //10
            'name' => "Withdraw Cancel",
        ]);
        DB::table('transaction_types')->insert([ //11
            'name' => "Sale Bet",
        ]);
        DB::table('transaction_types')->insert([ //12
            'name' => "Account Opening Bonus",
        ]);
        DB::table('transaction_types')->insert([ //13
            'name' => "Sponsorship Bonus",
        ]);
    }
}
