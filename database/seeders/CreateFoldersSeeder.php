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
                'user_id'=>'1',
                'name' => 'Category 1',
                'layer'=>'1',
                'main_folder_id'=>'0'
            ],
            [
                'user_id'=>'1',
                'name' => 'Category 2',
                'layer'=>'1',
                'main_folder_id'=>'0'
            ],
            [
                'user_id'=>'1',
                'name' => 'Category 3',
                'layer'=>'1',
                'main_folder_id'=>'0'
            ],
            [
                'user_id'=>'1',
                'name' => 'Sub Category 1',
                'layer'=>'2',
                'main_folder_id'=>'1'
            ],
           
            
        ];
  
        foreach ($folder as $key => $value) {
            Folder::create($value);
        }
    }
}
