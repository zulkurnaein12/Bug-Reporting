<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // admin //
        $data = [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ];

        $user = User::create($data);
        $user->assignRole('admin');

        // user //
        $data = [
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678'),
        ];

        $user = User::create($data);
        $user->assignRole('user');
    }
}
