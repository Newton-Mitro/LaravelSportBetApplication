<?php

use Illuminate\Database\Seeder;

class MethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('methods')->insert([
            'name' => "bKash",
        ]);
        DB::table('methods')->insert([
            'name' => "Nagod",
        ]);
        DB::table('methods')->insert([
            'name' => "Rocket",
        ]);
    }
}
