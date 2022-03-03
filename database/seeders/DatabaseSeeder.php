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
        $user = [
            [
               'name'=>'Admin',
               'email'=>'test@mail.com',
                'is_admin'=>'1',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'User',
               'email'=>'test2@mail.com',
                'is_admin'=>'0',
               'password'=> bcrypt('123456'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
