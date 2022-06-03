<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CreateNotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $note = [
            [
                'note' => 'Lorem Ipsum typesetting industry. Lorem Ipsum seeder example',
               'folder_id'=>'1',
                'user_id'=>'1'
            ],
            [
                'note' => 'Lorem Ipsum typesetting industry. Lorem Ipsum seeder example',
               'folder_id'=>'1',
                'user_id'=>'2'
            ],
            [
                'note' => Str::random(50),
               'folder_id'=>'1',
                'user_id'=>'3'
            ],
            
        ];
  
        foreach ($note as $key => $value) {
            Note::create($value);
        }
    }
}
