<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@example.com',
                'role'=>'1',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Main User',
               'email'=>'main_user@example.com',
                'role'=>'2',
               'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Sub User',
                'email'=>'sub_user@example.com',
                 'role'=>'3',
                'password'=> bcrypt('123456'),
             ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
    
}
