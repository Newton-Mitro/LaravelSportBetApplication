<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            StatusSeeder::class,
            TransactonTypeSeeder::class,
            ClubSeeder::class,
            MethodSeeder::class,
            AccountTypeSeeder::class,
            SportSeeder::class,
            TeamOrPlayerSeeder::class,
            MatchSeeder::class,
            MatchQuestionSeeder::class,
            MatchQuestionChoiceSeeder::class,
            SettingsSeeder::class,
            SliderTableSeeder::class,
            PhoneNumberTableSeeder::class,
        ]);
    }
}
