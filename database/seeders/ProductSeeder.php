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
/************************* store 1 Al Amin **********/
            ['category_id'=>'1','name'=>'Popcorn','description'=>'Ready-to-eat popcorn, various flavors available.','price'=>'50.0','image'=>'storage/images/products/food/corn.jpg','Ad-image'=>'//','categoryName'=>'food','storeName'=>'Al Amin','quantity'=>'200'],
            ['category_id'=>'1','name'=>'Cardamom Pods','description'=>'Aromatic and flavorful cardamom pods, perfect for cooking, baking, and beverages.','price'=>'25.0','image'=>'storage/images/products/food/cardamon.jpg','Ad-image'=>'//','categoryName'=>'food','storeName'=>'Al Amin','quantity'=>'500'],
            ['category_id'=>'1','name'=>'Kiri Cheese','description'=>'Creamy and smooth cheese, perfect for breakfast and snacks.','price'=>'20.0','image'=>'storage/images/products/food/kiri.jpg','Ad-image'=>'//','categoryName'=>'food','storeName'=>'Al Amin','quantity'=>'500'],
            ['category_id'=>'1','name'=>'Garlic Powder','description'=>'Dried and ground garlic, used as a spice for flavoring food.','price'=>'5.11','image'=>'storage/images/products/food/garlic powder.jpg','Ad-image'=>'//','categoryName'=>'food','storeName'=>'Noura','quantity'=>'50'],
            ['category_id'=>'1','name'=>'Eggs','description'=>'Fresh eggs, a versatile ingredient used in various dishes.','price'=>'3.00','image'=>'storage/images/products/food/egg.jpg','Ad-image'=>'//','categoryName'=>'food','storeName'=>'Al Amin','quantity'=>'30'],

            ['category_id'=>'2','name'=>'Downy','description'=>'Fabric softener that provides long-lasting freshness and softness to clothes.','price'=>'25.5','image'=>'storage/images/products/cleaners/downy.jpg','Ad-image'=>'//','categoryName'=>'cleaners','storeName'=>'Al Amin','quantity'=>'1000'],
            ['category_id'=>'2','name'=>'Ariel','description'=>'Powerful washing powder for automatic washing machines, removes tough stains effectively.','price'=>'30.2','image'=>'storage/images/products/cleaners/ariel.jpg','Ad-image'=>'//','categoryName'=>'cleaners','storeName'=>'Al Amin','quantity'=>'2500'],
            ['category_id'=>'2','name'=>'Clorox','description'=>'Disinfectant cleaner that kills 99.9% of germs and bacteria on various surfaces.','price'=>'15.5','image'=>'storage/images/products/cleaners/clorox.jpg','Ad-image'=>'//','categoryName'=>'cleaners','storeName'=>'Al Amin','quantity'=>'750'],

            ['category_id'=>'3','name'=>'3 Toy Bears','description'=>'Soft and cuddly toy bears, perfect for children and collectors.','price'=>'15.00','image'=>'storage/images/products/toys/bears3.jpg','Ad-image'=>'//','categoryName'=>'toys','storeName'=>'Al Amin','quantity'=>'20'],
            ['category_id'=>'3','name'=>'Teddy Bear','description'=>'A charming white teddy bear, ideal for gifts and cuddling.','price'=>'12.00','image'=>'storage/images/products/toys/bear white.jpg','Ad-image'=>'//','categoryName'=>'toys','storeName'=>'Al Amin','quantity'=>'15'],
            ['category_id'=>'3','name'=>'Duck Toy','description'=>'A fun and colorful duck toy, great for bath time and play.','price'=>'8.50','image'=>'storage/images/products/toys/duck.jpg','Ad-image'=>'//','categoryName'=>'toys','storeName'=>'Al Amin','quantity'=>'25'],
            ['category_id'=>'3','name'=>'Chick Toy','description'=>'An adorable chick toy, perfect for young children and Easter celebrations.','price'=>'7.00','image'=>'storage/images/products/toys/chick.jpg','Ad-image'=>'//','categoryName'=>'toys','storeName'=>'Al Amin','quantity'=>'18'],

            ['category_id'=>'4','name'=>'Blender','description'=>'A powerful kitchen blender for making smoothies, soups, and more.','price'=>'45.00','image'=>'storage/images/products/kitchen/blender.jpg','Ad-image'=>'//','categoryName'=>'kitchen','storeName'=>'Al Amin','quantity'=>'12'],
            ['category_id'=>'4','name'=>'Plates','description'=>'Durable and stylish plates for everyday dining.','price'=>'20.00','image'=>'storage/images/products/kitchen/plates1.jpg','Ad-image'=>'//','categoryName'=>'kitchen','storeName'=>'Al Amin','quantity'=>'50'],
            ['category_id'=>'4','name'=>'Plates set','description'=>'A complete set of plates and bowls for your dining needs.','price'=>'35.00','image'=>'storage/images/products/kitchen//plates2.jpg','Ad-image'=>'//','categoryName'=>'kitchen','storeName'=>'Al Amin','quantity'=>'30'],
            ['category_id'=>'4','name'=>'Bowls','description'=>'Versatile and durable bowls for serving soups, salads, and more.','price'=>'15.00','image'=>'storage/images/products/kitchen/bowls1.jpg','Ad-image'=>'//','categoryName'=>'kitchen','storeName'=>'Al Amin','quantity'=>'40'],
            ['category_id'=>'4','name'=>'Bowls','description'=>'Stylish and practical bowls for everyday use in your kitchen.','price'=>'18.00','image'=>'storage/images/products/kitchen/bowls2.jpg','Ad-image'=>'//','categoryName'=>'kitchen','storeName'=>'Al Amin','quantity'=>'35'],
            ['category_id'=>'4','name'=>'Bowls','description'=>'Elegant and functional bowls, perfect for serving a variety of dishes.','price'=>'20.00','image'=>'storage/images/products/kitchen/bowls3.jpg','Ad-image'=>'//','categoryName'=>'kitchen','storeName'=>'Al Amin','quantity'=>'50'],
            ['category_id'=>'4','name'=>'Coffee Cups','description'=>'Traditional Arabic coffee cups, perfect for serving authentic Arabic coffee.','price'=>'12.00','image'=>'storage/images/products/kitchen/cups.jpg','Ad-image'=>'//','categoryName'=>'kitchen','storeName'=>'Al Amin','quantity'=>'60'],

 /************************ store 2 Noura ****************/

            ['category_id'=>'5','name'=>'Salt','description'=>'Essential seasoning for cooking and flavoring food.','price'=>'2.5','image'=>'storage/images/products/food/salt.jpg','Ad-image'=>'//','categoryName'=>'food','storeName'=>'Noura','quantity'=>'1000'],
            ['category_id'=>'5','name'=>'Garlic Powder','description'=>'Dried and ground garlic, used as a spice for flavoring food.','price'=>'8.11','image'=>'storage/images/products/food/garlic.jpg','Ad-image'=>'//','categoryName'=>'food','storeName'=>'Noura','quantity'=>'250'],
            ['category_id'=>'5','name'=>'Pasta','description'=>'Dried pasta made from durum wheat, various shapes and sizes available.','price'=>'10.5','image'=>'storage/images/products/food/pasta.jpg','Ad-image'=>'//','categoryName'=>'food','storeName'=>'Noura','quantity'=>'500'],


            ['category_id'=>'6','name'=>'Kids Bike','description'=>'A bicycle designed for young children learning to ride, includes training wheels for stability.','price'=>'150.00','image'=>'storage/images/products/toys/bike.jpg','Ad-image'=>'//','categoryName'=>'toys','storeName'=>'Noura','quantity'=>'10'],
            ['category_id'=>'6','name'=>'Car Toy','description'=>'A small, colorful plastic toy car suitable for young children.','price'=>'200.5','image'=>'storage/images/products/toys/car.jpg','Ad-image'=>'//','categoryName'=>'toys','storeName'=>'Noura','quantity'=>'7'],
            ['category_id'=>'6','name'=>'Panda Toy','description'=>'A soft and cuddly panda plush toy.','price'=>'50','image'=>'storage/images/products/toys/panda.jpg','Ad-image'=>'//','categoryName'=>'toys','storeName'=>'Noura','quantity'=>'100'],

            ['category_id'=>'7','name'=>'Notebooks','description'=>'High-quality notebooks for school and office use.','price'=>'4.00','image'=>'storage/images/products/school/notebooks.jpg','Ad-image'=>'//','categoryName'=>'school','storeName'=>'Noura','quantity'=>'100'],
            ['category_id'=>'7','name'=>'Notebooks','description'=>'Durable and stylish notebooks for all your writing needs.','price'=>'5.00','image'=>'storage/images/products/school/notebooks2.jpg','Ad-image'=>'//','categoryName'=>'school','storeName'=>'Noura','quantity'=>'120'],
            ['category_id'=>'7','name'=>'Notebooks','description'=>'Eco-friendly notebooks with premium paper quality.','price'=>'6.00','image'=>'storage/images/products/school/notebooks3.jpg','Ad-image'=>'//','categoryName'=>'school','storeName'=>'Noura','quantity'=>'150'],
            ['category_id'=>'7','name'=>'Notebooks','description'=>'Colorful and functional notebooks for students and professionals.','price'=>'4.50','image'=>'storage/images/products/school/notebooks4.jpg','Ad-image'=>'//','categoryName'=>'school','storeName'=>'Noura','quantity'=>'200'],
            ['category_id'=>'7','name'=>'Notebooks','description'=>'Compact and lightweight notebooks for easy carrying and use.','price'=>'3.75','image'=>'storage/images/products/school/notebooks5.jpg','Ad-image'=>'//','categoryName'=>'school','storeName'=>'Noura','quantity'=>'180'],


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
