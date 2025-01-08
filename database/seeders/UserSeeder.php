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
            ['first-name'=>'nour','last-name'=>'haies','phone'=>'0955422200','password'=>'123456789'],
            ['first-name'=>'hadi','last-name'=>'gh','phone'=>'0938523272','password'=>'987654321'],

        ];

        foreach ($users as $user){
            User::create($user);
        }
    }
}
