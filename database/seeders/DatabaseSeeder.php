<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $users = 50;

        foreach (range(1, $users) as $client) {
            DB::table('clients')->insert([
                'firstName' => $faker->firstName(),
                'lastName' => $faker->lastName(),
                'personalCode' => $faker->regexify('[0-9]{11}')
            ]);
        }

        foreach (range(1, 150) as $accounts) {
            DB::table('accounts')->insert([
                'IBAN' => $faker->regexify('LT0099999[0-9]{11}'),
                'balance' => $faker->numberBetween(0, 10000),
                'client_id' => $faker->numberBetween(1, $users)
            ]);
        }

        DB::table('users')->insert([
            'name' => 'IS1ca7122a5fe82d',
            'email' => '98f87fd651@gmail.com',
            'password' => '$2y$12$ut5GSluYsR3gSLYhDYhX2.lj.vubcj/RzVrXg5QPVbzDbAF3GI5Km'
        ]);

        DB::table('users')->insert([
            'name' => 'Public',
            'email' => 'public@gmail.com',
            'password' => Hash::make('public')
        ]);
    }
}
