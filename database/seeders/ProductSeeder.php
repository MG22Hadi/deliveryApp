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

            ['category_id'=>'1','name'=>'Popcorn','description'=>'Ready-to-eat popcorn, various flavors available.','price'=>'50.0','image'=>'storage/images/products/food/corn.jpg','categoryName'=>'food','storeName'=>'Al Amin','quantity'=>'200'],
            ['category_id'=>'1','name'=>'Cardamom Pods','description'=>'Aromatic and flavorful cardamom pods, perfect for cooking, baking, and beverages.','price'=>'25.0','image'=>'storage/images/products/food/cardamon.jpg','categoryName'=>'food','storeName'=>'Al Amin','quantity'=>'500'],
            ['category_id'=>'1','name'=>'Kiri Cheese','description'=>'Creamy and smooth cheese, perfect for breakfast and snacks.','price'=>'20.0','image'=>'storage/images/products/food/kiri.jpg','categoryName'=>'food','storeName'=>'Al Amin','quantity'=>'500'],


            ['category_id'=>'2','name'=>'Downy','description'=>'Fabric softener that provides long-lasting freshness and softness to clothes.','price'=>'25.5','image'=>'storage/images/products/cleaners/downy.jpg','categoryName'=>'cleaners','storeName'=>'Al Amin','quantity'=>'1000'],
            ['category_id'=>'2','name'=>'Ariel','description'=>'Powerful washing powder for automatic washing machines, removes tough stains effectively.','price'=>'30.2','image'=>'storage/images/products/cleaners/ariel.jpg','categoryName'=>'cleaners','storeName'=>'Al Amin','quantity'=>'2500'],
            ['category_id'=>'2','name'=>'Clorox','description'=>'Disinfectant cleaner that kills 99.9% of germs and bacteria on various surfaces.','price'=>'15.5','image'=>'storage/images/products/cleaners/clorox.jpg','categoryName'=>'cleaners','storeName'=>'Al Amin','quantity'=>'750'],



            ['category_id'=>'3','name'=>'Salt','description'=>'Essential seasoning for cooking and flavoring food.','price'=>'2.5','image'=>'storage/images/products/food/salt.jpg','categoryName'=>'food','storeName'=>'Noura','quantity'=>'1000'],
            ['category_id'=>'3','name'=>'Garlic Powder','description'=>'Dried and ground garlic, used as a spice for flavoring food.','price'=>'8.11','image'=>'storage/images/products/food/garlic.jpg','categoryName'=>'food','storeName'=>'Noura','quantity'=>'250'],
            ['category_id'=>'3','name'=>'Pasta','description'=>'Dried pasta made from durum wheat, various shapes and sizes available.','price'=>'10.5','image'=>'storage/images/products/food/pasta.jpg','categoryName'=>'food','storeName'=>'Noura','quantity'=>'500'],


            ['category_id'=>'4','name'=>'Kids Bike','description'=>'A bicycle designed for young children learning to ride, includes training wheels for stability.','price'=>'150.00','image'=>'storage/images/products/toys/bike.jpg','categoryName'=>'toys','storeName'=>'Noura','quantity'=>'10'],
            ['category_id'=>'4','name'=>'Car Toy','description'=>'A small, colorful plastic toy car suitable for young children.','price'=>'200.5','image'=>'storage/images/products/toys/car.jpg','categoryName'=>'toys','storeName'=>'Noura','quantity'=>'7'],
            ['category_id'=>'4','name'=>'Panda Toy','description'=>'A soft and cuddly panda plush toy.','price'=>'50','image'=>'storage/images/products/toys/panda.jpg','categoryName'=>'toys','storeName'=>'Noura','quantity'=>'100'],


            /*



            ['category_id'=>'5','name'=>'A30','description'=>'good phone','price'=>'55','image'=>'//','categoryName'=>'phones','storeName'=>'Al hadi','quantity'=>'150'],
            ['category_id'=>'5','name'=>'A50','description'=>'good phone','price'=>'40','image'=>'//','categoryName'=>'phones','storeName'=>'Al hadi','quantity'=>'33'],
            ['category_id'=>'6','name'=>'lenovo','description'=>'good lap','price'=>'55','image'=>'//','categoryName'=>'laptops','storeName'=>'Al hadi','quantity'=>'50'],
            ['category_id'=>'6','name'=>'dell','description'=>'laptop','price'=>'40','image'=>'//','categoryName'=>'laptops','storeName'=>'Al hadi','quantity'=>'30'],


*/

        ];

        foreach ($products as $product){
            Product::create($product);
        }
    }
}
