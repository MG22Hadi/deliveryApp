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
            ['store_id'=>'1','name'=>'food'],//1
            ['store_id'=>'1','name'=>'cleaners'],//2
            ['store_id'=>'1','name'=>'toys'],//3
            ['store_id'=>'1','name'=>'kitchen'],//4


            ['store_id'=>'2','name'=>'food'],//5
            ['store_id'=>'2','name'=>'toys'],//6
            ['store_id'=>'2','name'=>'school'],//7


            ['store_id'=>'3','name'=>'food'],//8
            ['store_id'=>'3','name'=>'cleaners'],//9


            ['store_id'=>'4','name'=>'make up'],//10
            ['store_id'=>'4','name'=>'accessories'],//11


            ['store_id'=>'5','name'=>'head phone'],//12
            ['store_id'=>'5','name'=>'laptop'],//13
            ['store_id'=>'5','name'=>'mobile'],//14

            ['store_id'=>'6','name'=>'clothing'],//15
            ['store_id'=>'6','name'=>'shoes'],//16
            ['store_id'=>'6','name'=>'men'],//17
            ['store_id'=>'6','name'=>'bag'],//18
            ['store_id'=>'6','name'=>'baby'],//19






        ];

        foreach ($cats as $cat){
            Category::create($cat);
        }
    }
}
