<?php

use Illuminate\Database\Seeder;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clubs')->insert([
            'user_id' => 2,
            'club_name' => "Sport Bet",
            'status' => 1,
        ]);
    }
}
