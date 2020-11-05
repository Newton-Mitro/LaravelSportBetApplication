<?php

use Illuminate\Database\Seeder;

class PhoneNumberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phone_numbers')->insert([
            'method_id' => 1,
            'phone_number' => "01704-000001",
        ]);

        DB::table('phone_numbers')->insert([
            'method_id' => 2,
            'phone_number' => "01704-000002",
        ]);

        DB::table('phone_numbers')->insert([
            'method_id' => 3,
            'phone_number' => "01704-000003",
        ]);
    }
}
