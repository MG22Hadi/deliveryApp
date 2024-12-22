<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            ['name'=>'nour','email'=>'nour@gmail.com','password'=>'123456789'],
            ['name'=>'hadi','email'=>'hadi@gmail.com','password'=>'987654321'],
        ];

        foreach ($users as $user){
            User::create($user);
        }
    }
}
