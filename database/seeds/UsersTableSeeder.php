<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(0, 20) as $i) {
            DB::table('users')->insert([
                'chat_id' => $i + 12345678,
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName,
                'username' => $faker->userName,
                'email' => $faker->email,
                'activation_code' => mt_rand(100000, 999999),
                'is_activated' => true,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
