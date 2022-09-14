<?php

namespace Database\Seeders;

use App\Models\Bug;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $bug = Bug::first();
        $data = [
            'message' => $faker->text(100),
            'user_id' => User::inRandomOrder()->first()->id,
        ];

        $comment = $bug->comments()->create($data);

        $data = [
            'message' => $faker->text(100),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
        $comment->comments()->create($data);
    }
}
