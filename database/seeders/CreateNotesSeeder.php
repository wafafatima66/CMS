<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
// use Faker\Generator as faker;
use Faker\Factory as Faker;

class CreateNotesSeeder extends Seeder
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

        $note = [
            [
                'note' => $this->faker->slug(),
               'folder_id'=>'1',
                'user_id'=>'1',
                'title'=>$this->faker->title()
            ],
            [
                'note' => $this->faker->slug(),
               'folder_id'=>'1',
                'user_id'=>'1',
                'title'=>$this->faker->title()
            ],
            [
                'note' => $this->faker->Text() , 
               'folder_id'=>'1',
                'user_id'=>'1',
                'title'=>$this->faker->title()
            ],
            
        ];
  
        foreach ($note as $key => $value) {
            Note::create($value);
        }
    }
}
