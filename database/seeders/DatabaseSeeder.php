<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(2)->create();
        
        $user = [
            [
               'name'=>'Admin',
               'email'=>'   ',
                'is_admin'=>'1',
               'password'=> bcrypt('admin123'),
            ],
            [
               'name'=>'User',
               'email'=>'user@test.com',
                'is_admin'=>'0',
               'password'=> bcrypt('user123'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
        
    }
}
