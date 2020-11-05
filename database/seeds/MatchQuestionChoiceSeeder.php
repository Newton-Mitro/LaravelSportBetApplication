<?php

use Illuminate\Database\Seeder;

class MatchQuestionChoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('betting_choices')->insert([
            'betting_question_id' => rand(1,12),
            'choice_name' => "Draw",
            'can_place_bet' => 1,
            'wining_rate' => 1.4,
        ]);
        DB::table('betting_choices')->insert([
            'betting_question_id' => rand(1,12),
            'choice_name' => "Team One Will Win",
            'can_place_bet' => 1,
            'wining_rate' => 1.8,
        ]);
        DB::table('betting_choices')->insert([
            'betting_question_id' => rand(1,12),
            'choice_name' => "Team Two Will Win",
            'can_place_bet' => 1,
            'wining_rate' => 2,
        ]);
        DB::table('betting_choices')->insert([
            'betting_question_id' => rand(1,12),
            'choice_name' => "Draw",
            'can_place_bet' => 1,
            'wining_rate' => 1.4,
        ]);
        DB::table('betting_choices')->insert([
            'betting_question_id' => rand(1,12),
            'choice_name' => "Team One Will Win",
            'can_place_bet' => 1,
            'wining_rate' => 1.8,
        ]);
        DB::table('betting_choices')->insert([
            'betting_question_id' => rand(1,12),
            'choice_name' => "Team Two Will Win",
            'can_place_bet' => 1,
            'wining_rate' => 2,
        ]);
        DB::table('betting_choices')->insert([
            'betting_question_id' => rand(1,12),
            'choice_name' => "Draw",
            'can_place_bet' => 1,
            'wining_rate' => 1.4,
        ]);
        DB::table('betting_choices')->insert([
            'betting_question_id' => rand(1,12),
            'choice_name' => "Team One Will Win",
            'can_place_bet' => 1,
            'wining_rate' => 1.8,
        ]);
        DB::table('betting_choices')->insert([
            'betting_question_id' => rand(1,12),
            'choice_name' => "Team Two Will Win",
            'can_place_bet' => 1,
            'wining_rate' => 2,
        ]);

    }
}
