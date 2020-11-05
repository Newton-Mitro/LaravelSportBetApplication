<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => "Super Admin",
            'display_name' => "System Administrator",
        ]);
        DB::table('roles')->insert([
            'name' => "Admin",
            'display_name' => "Site Administrator",
        ]);
        DB::table('roles')->insert([
            'name' => "Deposit Admin",
            'display_name' => "Deposit Administrator",
        ]);
        DB::table('roles')->insert([
            'name' => "Withdraw Admin",
            'display_name' => "Withdraw Administrator",
        ]);
        DB::table('roles')->insert([
            'name' => "Match Admin",
            'display_name' => "Match Administrator",
        ]);
        DB::table('roles')->insert([
            'name' => "Group Owner",
            'display_name' => "Normal User How Owns a Group",
        ]);
        DB::table('roles')->insert([
            'name' => "User",
            'display_name' => "Normal User",
        ]);
    }
}
