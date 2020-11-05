<?php

use Illuminate\Database\Seeder;

class MatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matches')->insert([
            'sport_id' => rand(1,6),
            'title' => 'Match',
            'contestant_one' => 1,
            'contestant_two' => 2,
            'start_date' => "2020-05-30",
            'start_time' => "22:00:00",
            'is_open' => 1,
            'status_id' => rand(1,2),
        ]);
        DB::table('matches')->insert([
            'sport_id' => rand(1,6),
            'title' => 'Match',
            'contestant_one' => 2,
            'contestant_two' => 3,
            'start_date' => "2020-05-30",
            'start_time' => "22:00:00",
            'is_open' => 1,
            'status_id' => rand(1,2),
        ]);
        DB::table('matches')->insert([
            'sport_id' => rand(1,6),
            'title' => 'Match',
            'contestant_one' => 1,
            'contestant_two' => 3,
            'start_date' => "2020-05-30",
            'start_time' => "22:00:00",
            'is_open' => 1,
            'status_id' => rand(1,2),
        ]);
        DB::table('matches')->insert([
            'sport_id' => rand(1,6),
            'title' => 'Match',
            'contestant_one' => 4,
            'contestant_two' => 5,
            'start_date' => "2020-05-30",
            'start_time' => "22:00:00",
            'is_open' => 1,
            'status_id' => rand(1,2),
        ]);
    }
}
