<?php

use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sports')->insert([
            'name' => "Football",
            'icon' => 'http://testdamo.cccul.com/dist/img/football.png',
        ]);
        DB::table('sports')->insert([
            'name' => "Cricket",
            'icon' => 'http://testdamo.cccul.com/dist/img/cricket.png',
        ]);
        DB::table('sports')->insert([
            'name' => "Basketball",
            'icon' => 'http://testdamo.cccul.com/dist/img/basketball.png',
        ]);
        DB::table('sports')->insert([
            'name' => "Badminton",
            'icon' => 'http://testdamo.cccul.com/dist/img/badminton.png',
        ]);
        DB::table('sports')->insert([
            'name' => "Tennis",
            'icon' => 'http://testdamo.cccul.com/dist/img/tennis.png',
        ]);
        DB::table('sports')->insert([
            'name' => "Hockey",
            'icon' => 'http://testdamo.cccul.com/dist/img/hockey.png',
        ]);
    }
}
