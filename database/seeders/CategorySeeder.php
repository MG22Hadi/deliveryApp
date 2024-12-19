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
            ['store_id'=>'1','name'=>'sweets'],
            ['store_id'=>'2','name'=>'food'],
            ['store_id'=>'2','name'=>'sweets'],
            ['store_id'=>'3','name'=>'phones'],
            ['store_id'=>'3','name'=>'laptops'],
        ];

        foreach ($cats as $cat){
            Category::create($cat);
        }
    }
}
