<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use DateTime;
use DB;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->truncate();

        $faker = Faker::create();
        $contacts = [];

        foreach (range(1, 20) as $index)
        {
            $contacts[] = [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'address' => "{$faker->streetName} {$faker->postcode} {$faker->city}",
                'company' => $faker->company,
                'group_id' => rand(1, 3),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ];
        }

        DB::table('contacts')->insert($contacts);
    }
}
