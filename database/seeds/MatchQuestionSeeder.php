<?php

use Illuminate\Database\Seeder;

class MatchQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('betting_questions')->insert([
            'match_id' => 1,
            'question' => "Half Time Winner?",
        ]);
        DB::table('betting_questions')->insert([
            'match_id' => 1,
            'question' => "Full Time Winner?",
        ]);
        DB::table('betting_questions')->insert([
            'match_id' => 1,
            'question' => "Who wil get first red card?",
        ]);

        DB::table('betting_questions')->insert([
            'match_id' => 2,
            'question' => "Half Time Winner?",
        ]);
        DB::table('betting_questions')->insert([
            'match_id' => 2,
            'question' => "Full Time Winner?",
        ]);
        DB::table('betting_questions')->insert([
            'match_id' => 2,
            'question' => "Who wil get first red card?",
        ]);

        DB::table('betting_questions')->insert([
            'match_id' => 3,
            'question' => "Half Time Winner?",
        ]);
        DB::table('betting_questions')->insert([
            'match_id' => 3,
            'question' => "Full Time Winner?",
        ]);
        DB::table('betting_questions')->insert([
            'match_id' => 3,
            'question' => "Who wil get first red card?",
        ]);

        DB::table('betting_questions')->insert([
            'match_id' => 4,
            'question' => "Half Time Winner?",
        ]);
        DB::table('betting_questions')->insert([
            'match_id' => 4,
            'question' => "Full Time Winner?",
        ]);
        DB::table('betting_questions')->insert([
            'match_id' => 4,
            'question' => "Who wil get first red card?",
        ]);

    }
}
