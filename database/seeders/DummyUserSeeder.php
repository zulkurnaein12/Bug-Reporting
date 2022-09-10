<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //user
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            # code...
            $data = [
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => Hash::make('12345678'),
            ];

            $user = User::create($data);
            $user->assignRole('user');
        }
    }
}
