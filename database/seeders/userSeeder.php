<?php

namespace Database\Seeders;

use App\Models\Customers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as faker;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //faker

        $faker = Faker::create();

        for ($i = 1; $i < 20; $i++) {
            $customer = new Customers;

            $customer->name = $faker->name;
            $customer->email = $faker->email;
            $customer->gender = 'M';
            $customer->dob = $faker->date;
            $customer->address = $faker->address;
            $customer->password = $faker->password;
            $customer->points = '0';
            $customer->save();
        }

        // seeder 

        // DB::table('users')->truncate();

        // DB::table('users')->insert([
        //     [
        //         'name' => Str::random(10),
        //         'email' => Str::random(10) . '@gmail.com',
        //         'password' => Hash::make('password'),
        //     ],
        //     [
        //         'name' => Str::random(10),
        //         'email' => Str::random(10) . '@gmail.com',
        //         'password' => Hash::make('password'),
        //     ],

        //     ]);
    }
}
