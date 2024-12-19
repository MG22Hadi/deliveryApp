<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products=[
            ['category_id'=>'1','name'=>'labneh','description'=>'good labneh','price'=>'55','image'=>'//','categoryName'=>'food','storeName'=>'Al Amin','quantity'=>'50'],
            ['category_id'=>'1','name'=>'cheese','description'=>'good cheese','price'=>'40','image'=>'//','categoryName'=>'food','storeName'=>'Al Amin','quantity'=>'30'],
            ['category_id'=>'2','name'=>'chocolate','description'=>'good chocolate','price'=>'55','image'=>'//','categoryName'=>'sweets','storeName'=>'Al Amin','quantity'=>'50'],
            ['category_id'=>'2','name'=>'halaoy','description'=>'good halaoy','price'=>'40','image'=>'//','categoryName'=>'sweets','storeName'=>'Al Amin','quantity'=>'30'],

            ['category_id'=>'3','name'=>'labneh','description'=>'good labneh','price'=>'55','image'=>'//','categoryName'=>'food','storeName'=>'Noura','quantity'=>'70'],
            ['category_id'=>'3','name'=>'cheese','description'=>'good cheese','price'=>'40','image'=>'//','categoryName'=>'food','storeName'=>'Noura','quantity'=>'30'],
            ['category_id'=>'4','name'=>'chocolate','description'=>'good chocolate','price'=>'55','image'=>'//','categoryName'=>'sweets','storeName'=>'Noura','quantity'=>'50'],
            ['category_id'=>'4','name'=>'halaoy','description'=>'good halaoy','price'=>'40','image'=>'//','categoryName'=>'sweets','storeName'=>'Noura','quantity'=>'30'],

            ['category_id'=>'5','name'=>'A30','description'=>'good phone','price'=>'55','image'=>'//','categoryName'=>'phones','storeName'=>'Al hadi','quantity'=>'150'],
            ['category_id'=>'5','name'=>'A50','description'=>'good phone','price'=>'40','image'=>'//','categoryName'=>'phones','storeName'=>'Al hadi','quantity'=>'33'],
            ['category_id'=>'6','name'=>'lenovo','description'=>'good lap','price'=>'55','image'=>'//','categoryName'=>'laptops','storeName'=>'Al hadi','quantity'=>'50'],
            ['category_id'=>'6','name'=>'dell','description'=>'laptop','price'=>'40','image'=>'//','categoryName'=>'laptops','storeName'=>'Al hadi','quantity'=>'30'],
        ];

        foreach ($products as $product){
            Product::create($product);
        }
    }
}
