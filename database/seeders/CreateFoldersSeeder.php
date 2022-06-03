<?php

namespace Database\Seeders;

use App\Models\Folder;
use Illuminate\Database\Seeder;

class CreateFoldersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $folder = [
            [
                'name' => 'Folder 1',
               'layer'=>'1'
            ],
            [
                'name' => 'Folder 1',
               'layer'=>'1'
            ],
            [
                'name' => 'Folder 1',
               'layer'=>'1'
            ],
            
        ];
  
        foreach ($folder as $key => $value) {
            Folder::create($value);
        }
    }
}
