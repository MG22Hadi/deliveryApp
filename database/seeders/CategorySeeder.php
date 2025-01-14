<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cats=[
            ['store_id'=>'1','name'=>'food'],
            ['store_id'=>'1','name'=>'cleaners'],
            ['store_id'=>'1','name'=>'toys'],
            ['store_id'=>'1','name'=>'kitchen'],


            ['store_id'=>'2','name'=>'food'],
            ['store_id'=>'2','name'=>'toys'],
            ['store_id'=>'2','name'=>'school'],


            ['store_id'=>'3','name'=>'food'],
            ['store_id'=>'3','name'=>'cleaners'],
        ];

        foreach ($cats as $cat){
            Category::create($cat);
        }
    }
}
