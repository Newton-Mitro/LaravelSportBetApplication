<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 1,
            'name' => 'Super Admin',
            'phone' => '01700-000000',
            'email' => 'super.admin@smail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('super.admin@smail.com'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'role_id' => 2,
            'name' => 'Site Administrator',
            'email' => 'admin@email.com',
            'phone' => '01700-000000',
            'email_verified_at' => now(),
            'password' => bcrypt('admin@email.com'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'role_id' => 3,
            'name' => 'Deposit Administrator',
            'phone' => '01700-000000',
            'email' => 'deposit.admin@dmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('deposit.admin@dmail.com'),
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'role_id' => 4,
            'name' => 'Withdraw Administrator',
            'phone' => '01700-000000',
            'email' => 'withdraw.admin@wmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('withdraw.admin@wmail.com'),
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'role_id' => 5,
            'name' => 'Match Administrator',
            'phone' => '01700-000000',
            'email' => 'match.admin@mmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('match.admin@mmail.com'),
            'remember_token' => Str::random(10),
        ]);

//        factory(App\User::class, 20)->create();
    }
}
