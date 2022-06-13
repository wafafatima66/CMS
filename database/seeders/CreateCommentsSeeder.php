<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CreateCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();
        // $number = $this->faker->randomDigit();

        $comment = [
            [
                'comment' => $this->faker->paragraph(6),
                'note_id' => '1',
                'user_id' => '1'
            ],
            [
                'comment' => $this->faker->paragraph(6),
                'note_id' => '1',
                'user_id' => '1'
            ],
            [
                'comment' => $this->faker->paragraph(6),
                'note_id' => '1',
                'user_id' => '1'
            ],


        ];

        foreach ($comment as $key => $value) {
            Comment::create($value);
        }
    }
}
