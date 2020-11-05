<?php

use Illuminate\Database\Seeder;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account_types')->insert([
            'name' => "Personal",
        ]);
        DB::table('account_types')->insert([
            'name' => "Agent",
        ]);
    }
}
