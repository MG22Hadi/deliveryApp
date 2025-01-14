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
            ['category_id'=>'1','name'=>'Popcorn','description'=>'Ready-to-eat popcorn, various flavors available.','price'=>'50.0','image'=>'storage/images/products/food/corn.jpg','AdImage'=>'//','categoryName'=>'food','storeName'=>'Al Amin','quantity'=>'200'],
            ['category_id'=>'1','name'=>'Cardamom Pods','description'=>'Aromatic and flavorful cardamom pods, perfect for cooking, baking, and beverages.','price'=>'25.0','image'=>'storage/images/products/food/cardamon.jpg','AdImage'=>'//','categoryName'=>'food','storeName'=>'Al Amin','quantity'=>'500'],
            ['category_id'=>'1','name'=>'Kiri Cheese','description'=>'Creamy and smooth cheese, perfect for breakfast and snacks.','price'=>'20.0','image'=>'storage/images/products/food/kiri.jpg','AdImage'=>'//','categoryName'=>'food','storeName'=>'Al Amin','quantity'=>'500'],
            ['category_id'=>'1','name'=>'Garlic Powder','description'=>'Dried and ground garlic, used as a spice for flavoring food.','price'=>'5.11','image'=>'storage/images/products/food/garlic powder.jpg','AdImage'=>'//','categoryName'=>'food','storeName'=>'Noura','quantity'=>'50'],
            ['category_id'=>'1','name'=>'Eggs','description'=>'Fresh eggs, a versatile ingredient used in various dishes.','price'=>'3.00','image'=>'storage/images/products/food/egg.jpg','AdImage'=>'//','categoryName'=>'food','storeName'=>'Al Amin','quantity'=>'30'],

            ['category_id'=>'2','name'=>'Downy','description'=>'Fabric softener that provides long-lasting freshness and softness to clothes.','price'=>'25.5','image'=>'storage/images/products/cleaners/downy.jpg','AdImage'=>'//','categoryName'=>'cleaners','storeName'=>'Al Amin','quantity'=>'1000'],
            ['category_id'=>'2','name'=>'Ariel','description'=>'Powerful washing powder for automatic washing machines, removes tough stains effectively.','price'=>'30.2','image'=>'storage/images/products/cleaners/ariel.jpg','AdImage'=>'//','categoryName'=>'cleaners','storeName'=>'Al Amin','quantity'=>'2500'],
            ['category_id'=>'2','name'=>'Clorox','description'=>'Disinfectant cleaner that kills 99.9% of germs and bacteria on various surfaces.','price'=>'15.5','image'=>'storage/images/products/cleaners/clorox.jpg','AdImage'=>'//','categoryName'=>'cleaners','storeName'=>'Al Amin','quantity'=>'750'],

            ['category_id'=>'3','name'=>'3 Toy Bears','description'=>'Soft and cuddly toy bears, perfect for children and collectors.','price'=>'15.00','image'=>'storage/images/products/toys/bears3.jpg','AdImage'=>'//','categoryName'=>'toys','storeName'=>'Al Amin','quantity'=>'20'],
            ['category_id'=>'3','name'=>'Teddy Bear','description'=>'A charming white teddy bear, ideal for gifts and cuddling.','price'=>'12.00','image'=>'storage/images/products/toys/bear white.jpg','AdImage'=>'//','categoryName'=>'toys','storeName'=>'Al Amin','quantity'=>'15'],
            ['category_id'=>'3','name'=>'Duck Toy','description'=>'A fun and colorful duck toy, great for bath time and play.','price'=>'8.50','image'=>'storage/images/products/toys/duck.jpg','AdImage'=>'//','categoryName'=>'toys','storeName'=>'Al Amin','quantity'=>'25'],
            ['category_id'=>'3','name'=>'Chick Toy','description'=>'An adorable chick toy, perfect for young children and Easter celebrations.','price'=>'7.00','image'=>'storage/images/products/toys/chick.jpg','AdImage'=>'//','categoryName'=>'toys','storeName'=>'Al Amin','quantity'=>'18'],

            ['category_id'=>'4','name'=>'Blender','description'=>'A powerful kitchen blender for making smoothies, soups, and more.','price'=>'45.00','image'=>'storage/images/products/kitchen/blender.jpg','AdImage'=>'//','categoryName'=>'kitchen','storeName'=>'Al Amin','quantity'=>'12'],
            ['category_id'=>'4','name'=>'Plates','description'=>'Durable and stylish plates for everyday dining.','price'=>'20.00','image'=>'storage/images/products/kitchen/plates1.jpg','AdImage'=>'//','categoryName'=>'kitchen','storeName'=>'Al Amin','quantity'=>'50'],
            ['category_id'=>'4','name'=>'Plates set','description'=>'A complete set of plates and bowls for your dining needs.','price'=>'35.00','image'=>'storage/images/products/kitchen/plates2.jpg','AdImage'=>'//','categoryName'=>'kitchen','storeName'=>'Al Amin','quantity'=>'30'],
            ['category_id'=>'4','name'=>'Bowls','description'=>'Versatile and durable bowls for serving soups, salads, and more.','price'=>'15.00','image'=>'storage/images/products/kitchen/bowls1.jpg','AdImage'=>'//','categoryName'=>'kitchen','storeName'=>'Al Amin','quantity'=>'40'],
            ['category_id'=>'4','name'=>'Bowls','description'=>'Stylish and practical bowls for everyday use in your kitchen.','price'=>'18.00','image'=>'storage/images/products/kitchen/bowls2.jpg','AdImage'=>'//','categoryName'=>'kitchen','storeName'=>'Al Amin','quantity'=>'35'],
            ['category_id'=>'4','name'=>'Bowls','description'=>'Elegant and functional bowls, perfect for serving a variety of dishes.','price'=>'20.00','image'=>'storage/images/products/kitchen/bowls3.jpg','AdImage'=>'//','categoryName'=>'kitchen','storeName'=>'Al Amin','quantity'=>'50'],
            ['category_id'=>'4','name'=>'Coffee Cups','description'=>'Traditional Arabic coffee cups, perfect for serving authentic Arabic coffee.','price'=>'12.00','image'=>'storage/images/products/kitchen/cups.jpg','AdImage'=>'//','categoryName'=>'kitchen','storeName'=>'Al Amin','quantity'=>'60'],

 /************************ store 2 Noura ****************/

            ['category_id'=>'5','name'=>'Salt','description'=>'Essential seasoning for cooking and flavoring food.','price'=>'2.5','image'=>'storage/images/products/food/salt.jpg','AdImage'=>'//','categoryName'=>'food','storeName'=>'Noura','quantity'=>'1000'],
            ['category_id'=>'5','name'=>'Garlic Powder','description'=>'Dried and ground garlic, used as a spice for flavoring food.','price'=>'8.11','image'=>'storage/images/products/food/garlic.jpg','AdImage'=>'//','categoryName'=>'food','storeName'=>'Noura','quantity'=>'250'],
            ['category_id'=>'5','name'=>'Pasta','description'=>'Dried pasta made from durum wheat, various shapes and sizes available.','price'=>'10.5','image'=>'storage/images/products/food/pasta.jpg','AdImage'=>'//','categoryName'=>'food','storeName'=>'Noura','quantity'=>'500'],
            ['category_id'=>'5','name'=>'Oil','description'=>'High-quality cooking oil for frying, baking, and dressing.','price'=>'7.00','image'=>'storage/images/products/food/oil.jpg','AdImage'=>'//','categoryName'=>'food','storeName'=>'Noura','quantity'=>'500'],
            ['category_id' =>'5','name' =>'Spaghetti','description' =>'Long, thin pasta perfect for a variety of sauces and dishes.', 'price' => '3.5', 'image' => 'storage/images/products/food/spagitty.jpg','AdImage' =>'//','categoryName' =>'food','storeName' =>'Noura','quantity' =>'50'],

            ['category_id'=>'6','name'=>'Kids Bike','description'=>'A bicycle designed for young children learning to ride, includes training wheels for stability.','price'=>'150.00','image'=>'storage/images/products/toys/bike.jpg','AdImage'=>'//','categoryName'=>'toys','storeName'=>'Noura','quantity'=>'10'],
            ['category_id'=>'6','name'=>'Car Toy','description'=>'A small, colorful plastic toy car suitable for young children.','price'=>'200.5','image'=>'storage/images/products/toys/car.jpg','AdImage'=>'//','categoryName'=>'toys','storeName'=>'Noura','quantity'=>'7'],
            ['category_id'=>'6','name'=>'Panda Toy','description'=>'A soft and cuddly panda plush toy.','price'=>'50','image'=>'storage/images/products/toys/panda.jpg','AdImage'=>'//','categoryName'=>'toys','storeName'=>'Noura','quantity'=>'100'],

            ['category_id'=>'7','name'=>'Notebooks','description'=>'High-quality notebooks for school and office use.','price'=>'4.00','image'=>'storage/images/products/school/notebooks.jpg','AdImage'=>'//','categoryName'=>'school','storeName'=>'Noura','quantity'=>'100'],
            ['category_id'=>'7','name'=>'Notebooks','description'=>'Durable and stylish notebooks for all your writing needs.','price'=>'5.00','image'=>'storage/images/products/school/notebooks2.jpg','AdImage'=>'//','categoryName'=>'school','storeName'=>'Noura','quantity'=>'120'],
            ['category_id'=>'7','name'=>'Notebooks','description'=>'Eco-friendly notebooks with premium paper quality.','price'=>'6.00','image'=>'storage/images/products/school/notebooks3.jpg','AdImage'=>'//','categoryName'=>'school','storeName'=>'Noura','quantity'=>'150'],
            ['category_id'=>'7','name'=>'Notebooks','description'=>'Colorful and functional notebooks for students and professionals.','price'=>'4.50','image'=>'storage/images/products/school/notebooks4.jpg','AdImage'=>'//','categoryName'=>'school','storeName'=>'Noura','quantity'=>'200'],
            ['category_id'=>'7','name'=>'Notebooks','description'=>'Compact and lightweight notebooks for easy carrying and use.','price'=>'3.75','image'=>'storage/images/products/school/notebooks5.jpg','AdImage'=>'//','categoryName'=>'school','storeName'=>'Noura','quantity'=>'180'],


            /********** al hadi ******************* */
            ['category_id' =>'8','name' => 'Ground Cinnamon', 'description' => 'Finely ground cinnamon powder, perfect for adding warmth and flavor to desserts, beverages, and dishes.', 'price' => '4.0', 'image' => 'storage/images/products/food/Cinnamon.jpg','AdImage' => '//','categoryName' => 'food','storeName' => 'Al hadi','quantity' => '1000'],
            ['category_id' =>'8','name' => 'Coarse Cinnamon', 'description' => 'Coarse cinnamon sticks, ideal for infusing flavor into teas, stews, and traditional dishes.', 'price' => '4.5', 'image' => 'storage/images/products/food/cinnamon2.jpg','AdImage' => '//','categoryName' => 'food','storeName' => 'Al hadi','quantity' => '800'],
            ['category_id' =>'8','name' => 'Curry Powder', 'description' => 'A blend of aromatic spices, perfect for adding rich flavor to curries, soups, and marinades.', 'price' => '5.0', 'image' => 'storage/images/products/food/curry_powder.jpg','AdImage' => '//','categoryName' => 'food','storeName' => 'Al hadi','quantity' => '750'],
            ['category_id' =>'8','name' => 'Shawarma Spices', 'description' => 'A special blend of spices used to flavor shawarma, giving it a rich and authentic taste.', 'price' => '6.0', 'image' => 'storage/images/products/food/shawarma_spices.jpg','AdImage' => '//','categoryName' => 'food','storeName' => 'Al hadi','quantity' => '600'],


            ['category_id' =>'9','name' => 'Cif Cleaner', 'description' => 'Powerful bathroom cleaner that removes tough stains and leaves surfaces sparkling clean.', 'price' => '8.0', 'image' => 'storage/images/products/cleaners/cif_cleaner.jpg','AdImage' => '//','categoryName' => 'cleaners','storeName' => 'Al hadi','quantity' => '450'],
            ['category_id' =>'9','name' => 'Musculo Cleaner', 'description' => 'Effective bathroom cleaner that eliminates tough stains, dirt, and grime, leaving your bathroom fresh and clean.', 'price' => '7.5', 'image' => 'storage/images/products/cleaners/mr.jpg','AdImage' => '//','categoryName' => 'cleaners','storeName' => 'Al hadi','quantity' => '500'],
            ['category_id' =>'9','name' => 'Cleaning Set', 'description' => 'A complete set of cleaning products for all your household needs, including kitchen, bathroom, and floor cleaners.', 'price' => '25.0', 'image' => 'storage/images/products/cleaners/cleaning_set.jpg','AdImage' => '//','categoryName' => 'cleaners','storeName' => 'Al hadi','quantity' => '200'],
            ['category_id' =>'9','name' => 'Spray Cleaner', 'description' => 'Versatile spray cleaner for quick and effective cleaning of various surfaces.', 'price' => '5.5', 'image' => 'storage/images/products/cleaners/spray.jpg','AdImage' => '//','categoryName' => 'cleaners','storeName' => 'Al hadi','quantity' => '300'],

            /************ hyat ************/
            ['category_id'=>'10','name'=>'lip stick','description'=>'High-quality lipstick with vibrant colors and long-lasting finish, perfect for enhancing your beauty.','price'=>'2.5','image'=>'storage/images/products/make up/roog.jpg','AdImage'=>'//','categoryName'=>'make up','storeName'=>'Al hyat','quantity'=>'1000'],
            ['category_id'=>'10','name'=>'Makeup Brushes','description'=>'High-quality makeup brushes for precise and flawless application of cosmetics.','price'=>'15.0','image'=>'storage/images/products/make up/brushes.jpg','AdImage'=>'//','categoryName'=>'make up','storeName'=>'Al hyat','quantity'=>'200'],
            ['category_id'=>'10','name'=>'Light Pink Lipstick','description'=>'High-quality makeup brushes for precise and flawless application of cosmetics.','price'=>'12.0','image'=>'storage/images/products/make up/lip.jpg','AdImage'=>'//','categoryName'=>'make up','storeName'=>'Al hyat','quantity'=>'150'],
            ['category_id'=>'10','name'=>'Makeup Brushes','description'=>'High-quality makeup brushes for precise and flawless application of cosmetics.','price'=>'15.0','image'=>'storage/images/products/make up/brushes2.jpg','AdImage'=>'//','categoryName'=>'make up','storeName'=>'Al hyat','quantity'=>'200'],
            ['category_id'=>'10','name'=>'Red Lipstick','description'=>'High-quality makeup brushes for precise and flawless application of cosmetics.','price'=>'12.0','image'=>'storage/images/products/make up/lip2.jpg','AdImage'=>'//','categoryName'=>'make up','storeName'=>'Al hyat','quantity'=>'150'],
            ['category_id'=>'10','name'=>'Glow Baby','description'=>'Gentle and effective face wash for a radiant and glowing skin.','price'=>'8.0','image'=>'storage/images/products/make up/glow.jpg','AdImage'=>'//','categoryName'=>'make up','storeName'=>'Al hyat','quantity'=>'300'],
            ['category_id'=>'10','name'=>'Face Wash','description'=>'Gentle and effective face wash for a radiant and glowing skin.','price'=>'10.0','image'=>'storage/images/products/make up/facewash.jpg','AdImage'=>'//','categoryName'=>'make up','storeName'=>'Al hyat','quantity'=>'250'],
            ['category_id'=>'10','name'=>'Makeup Remover','description'=>'Gentle and effective makeup remover for all skin types.','price'=>'7.5','image'=>'storage/images/products/make up/remover.jpg','AdImage'=>'//','categoryName'=>'make up','storeName'=>'Al hyat','quantity'=>'180'],
            ['category_id'=>'10','name'=>'BBA Cream','description'=>'Moisturizing and nourishing face cream for healthy and glowing skin.','price'=>'20.0','image'=>'storage/images/products/make up/bba.jpg','AdImage'=>'//','categoryName'=>'make up','storeName'=>'Al hyat','quantity'=>'120'],


            ['category_id'=>'11','name'=>'Neck Collar','description'=>'Stylish and comfortable neck collar accessory for a trendy look.','price'=>'15.0','image'=>'storage/images/products/accessories/neck_collar.jpg','AdImage'=>'//','categoryName'=>'accessories','storeName'=>'Al hyat','quantity'=>'80'],
            ['category_id'=>'11','name'=>'Earrings Set','description'=>'Beautiful and trendy earrings set for girls, perfect for any occasion.','price'=>'25.0','image'=>'storage/images/products/accessories/earrings_set.jpg','AdImage'=>'//','categoryName'=>'accessories','storeName'=>'Al hyat','quantity'=>'100'],
            ['category_id'=>'11','name'=>'Wrist Watch','description'=>'Elegant and stylish wrist watch for women.','price'=>'50.0','image'=>'storage/images/products/accessories/wrist_watch.jpg','AdImage'=>'//','categoryName'=>'accessories','storeName'=>'Al hyat','quantity'=>'60'],
            ['category_id'=>'11','name'=>'Earrings Set','description'=>'A stunning collection of earrings for various occasions.','price'=>'30.0','image'=>'storage/images/products/accessories/earrings_set2.jpg','AdImage'=>'//','categoryName'=>'accessories','storeName'=>'Al hyat','quantity'=>'90'],
            ['category_id'=>'11','name'=>'Earrings Set','description'=>'A stunning collection of earrings for various occasions.','price'=>'30.0','image'=>'storage/images/products/accessories/earrings_set3.jpg','AdImage'=>'//','categoryName'=>'accessories','storeName'=>'Al hyat','quantity'=>'90'],
            ['category_id'=>'11','name'=>'Earrings Set','description'=>'A versatile and elegant set of earrings, perfect for adding a touch of sophistication to any outfit.','price'=>'30.0','image'=>'storage/images/products/accessories/earrings_set4.jpg','AdImage'=>'//','categoryName'=>'accessories','storeName'=>'Al hyat','quantity'=>'90'],
            ['category_id'=>'11','name'=>'Bracelets','description'=>'Stylish and trendy bracelets for a fashionable look.','price'=>'20.0','image'=>'storage/images/products/accessories/bracelets.jpg','AdImage'=>'//','categoryName'=>'accessories','storeName'=>'Al hyat','quantity'=>'120'],
            ['category_id'=>'11','name'=>'necklace Set','description'=>'A trendy and stylish set of neck collars for girls, perfect for enhancing any outfit.','price'=>'18.0','image'=>'storage/images/products/accessories/neck_collars_set.jpg','AdImage'=>'//','categoryName'=>'accessories','storeName'=>'Al hyat','quantity'=>'85'],
            ['category_id'=>'11','name'=>'Rings','description'=>'Elegant and stylish rings for a sophisticated look.','price'=>'25.0','image'=>'storage/images/products/accessories/rings.jpg','AdImage'=>'//','categoryName'=>'accessories','storeName'=>'Al hyat','quantity'=>'100'],
            ['category_id'=>'11','name'=>'Necklace Set','description'=>'A charming collection of necklaces for girls, perfect for adding elegance to any outfit.','price'=>'22.0','image'=>'storage/images/products/accessories/girls_necklace_set.jpg','AdImage'=>'//','categoryName'=>'accessories','storeName'=>'Al hyat','quantity'=>'75'],

/********************** haies******************/


            ['category_id'=>'12','name'=>'Headphones','description'=>'High-quality headphones with excellent sound clarity and comfort.','price'=>'45.0','image'=>'storage/images/products/electronics/headphones.jpg','AdImage'=>'//','categoryName'=>'head phone','storeName'=>'Haies store','quantity'=>'50'],
            ['category_id'=>'12','name'=>'Earbuds','description'=>'Wireless earbuds with superior sound quality and long battery life.','price'=>'60.0','image'=>'storage/images/products/electronics/earbuds.jpg','AdImage'=>'//','categoryName'=>'head phone','storeName'=>'Haies store','quantity'=>'40'],
            ['category_id'=>'12','name'=>'Wired Headphones','description'=>'Modern and stylish wired headphones with high-quality sound and comfortable design.','price'=>'35.0','image'=>'storage/images/products/electronics/wired_headphones.jpg','AdImage'=>'//','categoryName'=>'head phone','storeName'=>'Haies store','quantity'=>'55'],
            ['category_id'=>'12','name'=>'Heart Earbuds','description'=>'Adorable heart-shaped wireless earbuds with excellent sound quality and a stylish design.','price'=>'55.0','image'=>'storage/images/products/electronics/heart_shaped_earbuds.jpg','AdImage'=>'//','categoryName'=>'head phone','storeName'=>'Haies store','quantity'=>'45'],
            ['category_id'=>'12','name'=>'Regular Earbuds','description'=>'Standard wireless earbuds with great sound quality and a comfortable fit.','price'=>'40.0','image'=>'storage/images/products/electronics/regular_earbuds.jpg','AdImage'=>'//','categoryName'=>'head phone','storeName'=>'Haies store','quantity'=>'60'],
            ['category_id'=>'12','name'=>'Headphones','description'=>'Stylish purple headphones with excellent sound quality and comfortable ear cushions.','price'=>'50.0','image'=>'storage/images/products/electronics/purple_headphones.jpg','AdImage'=>'//','categoryName'=>'head phone','storeName'=>'Haies store','quantity'=>'35'],
            ['category_id'=>'12','name'=>'Pink Earbuds','description'=>'Stylish pink wireless earbuds with excellent sound quality and a comfortable fit.','price'=>'48.0','image'=>'storage/images/products/electronics/pink_earbuds.jpg','AdImage'=>'//','categoryName'=>'head phone','storeName'=>'Haies store','quantity'=>'40'],
            ['category_id'=>'12','name'=>'Stylish Headphones','description'=>'Modern and trendy headphones with superior sound quality and a sleek design.','price'=>'65.0','image'=>'storage/images/products/electronics/stylish_headphones.jpg','AdImage'=>'//','categoryName'=>'head phone','storeName'=>'Haies store','quantity'=>'30'],
            ['category_id'=>'12','name'=>'Star Earbuds','description'=>'Unique star-shaped wireless earbuds with excellent sound quality and a trendy design.','price'=>'55.0','image'=>'storage/images/products/electronics/star_earbuds.jpg','AdImage'=>'//','categoryName'=>'head phone','storeName'=>'Haies store','quantity'=>'25'],



            ['category_id'=>'13','name'=>'Laptop','description'=>'Powerful and portable laptop with high performance for work and entertainment.','price'=>'1200.0','image'=>'storage/images/products/electronics/laptop.jpg','AdImage'=>'//','categoryName'=>'laptop','storeName'=>'Haies store','quantity'=>'15'],
            ['category_id'=>'13','name'=>'Pink Laptop','description'=>'Stylish and powerful pink laptop, perfect for both work and personal use.','price'=>'1300.0','image'=>'storage/images/products/electronics/laptop2.jpg','AdImage'=>'//','categoryName'=>'laptop','storeName'=>'Haies store','quantity'=>'10'],
            ['category_id'=>'13','name'=>'Modern Laptop','description'=>'Sleek and modern laptop with cutting-edge technology for ultimate performance.','price'=>'1400.0','image'=>'storage/images/products/electronics/laptop3.jpg','AdImage'=>'//','categoryName'=>'laptop','storeName'=>'Haies store','quantity'=>'12'],
            ['category_id'=>'13','name'=>'Laptop','description'=>'Ultra-light and portable laptop, ideal for on-the-go productivity and entertainment.','price'=>'1100.0','image'=>'storage/images/products/electronics/laptop.jpg','AdImage'=>'//','categoryName'=>'laptop4','storeName'=>'Haies store','quantity'=>'18'],




            ['category_id'=>'14','name'=>'Phone A50','description'=>'Advanced Samsung smartphone with high-performance features and a stunning display.','price'=>'900.0','image'=>'storage/images/products/electronics/samsung_phone.jpg','AdImage'=>'//','categoryName'=>'mobile','storeName'=>'Haies store','quantity'=>'20'],
            ['category_id'=>'14','name'=>'iPhone 15','description'=>'The latest iPhone with cutting-edge technology, a powerful camera, and a sleek design.','price'=>'1200.0','image'=>'storage/images/products/electronics/iphone_15.jpg','AdImage'=>'//','categoryName'=>'mobile','storeName'=>'Haies store','quantity'=>'20'],
            ['category_id'=>'14','name'=>'iPhone 14','description'=>'Powerful and stylish iPhone with advanced features and a brilliant display.','price'=>'1000.0','image'=>'storage/images/products/electronics/iphone_14.jpg','AdImage'=>'//','categoryName'=>'mobile','storeName'=>'Haies store','quantity'=>'25'],
            ['category_id'=>'14','name'=>'Samsung S22','description'=>'Flagship Samsung S22 with a powerful processor, stunning camera, and sleek design.','price'=>'950.0','image'=>'storage/images/products/electronics/samsung_s22.jpg','AdImage'=>'//','categoryName'=>'mobile','storeName'=>'Haies store','quantity'=>'22'],

            /***** fasion*************************************/
            ['category_id'=>'15','name'=>'Pink Pajama','description'=>'Comfortable and stylish pink pajama, perfect for a good night\'s sleep.','price'=>'25.0','image'=>'storage/images/products/fashion/pink_pajama.jpg','AdImage'=>'//','categoryName'=>'clothing','storeName'=>'fashion store','quantity'=>'50'],
            ['category_id'=>'15','name'=>'Pajama','description'=>'Comfortable and elegant green and white pajama, perfect for a relaxing night.','price'=>'25.0','image'=>'storage/images/products/fashion/green_white_pajama.jpg','AdImage'=>'//','categoryName'=>'clothing','storeName'=>'fashion store','quantity'=>'50'],
            ['category_id'=>'15','name'=>'White Hoodie','description'=>'Cozy and stylish white hoodie, perfect for casual outings and chilly days.','price'=>'35.0','image'=>'storage/images/products/fashion/white_hoodie.jpg','AdImage'=>'//','categoryName'=>'clothing','storeName'=>'fashion store','quantity'=>'40'],
            ['category_id'=>'15','name'=>'Jeans Pants','description'=>'Classic and durable jeans pants, perfect for a stylish and casual look.','price'=>'45.0','image'=>'storage/images/products/fashion/jeans_pants.jpg','AdImage'=>'//','categoryName'=>'clothing','storeName'=>'fashion store','quantity'=>'30'],
            ['category_id'=>'15','name'=>'Pants & Sweater','description'=>'Elegant black pants paired with a cozy black sweater, perfect for a chic and stylish look.','price'=>'60.0','image'=>'storage/images/products/fashion/black_pants_sweater.jpg','AdImage'=>'//','categoryName'=>'clothing','storeName'=>'fashion store','quantity'=>'25'],
            ['category_id'=>'15','name'=>'Grey Sweater','description'=>'Soft and cozy grey sweater, perfect for staying warm and stylish during colder days.','price'=>'40.0','image'=>'storage/images/products/fashion/grey_sweater.jpg','AdImage'=>'//','categoryName'=>'clothing','storeName'=>'fashion store','quantity'=>'35'],


            ['category_id'=>'16','name'=>'Boots','description'=>'Stylish and durable boots, perfect for any season and occasion.','price'=>'80.0','image'=>'storage/images/products/fashion/boots.jpg','AdImage'=>'//','categoryName'=>'shoes','storeName'=>'fashion store','quantity'=>'20'],
            ['category_id'=>'16','name'=>'Black Boots','description'=>'Stylish and durable black boots, perfect for any season and occasion.','price'=>'80.0','image'=>'storage/images/products/fashion/black_boots.jpg','AdImage'=>'//','categoryName'=>'shoes','storeName'=>'fashion store','quantity'=>'20'],
            ['category_id'=>'16','name'=>'Colorful Boots','description'=>'Trendy and colorful modern boots, perfect for making a bold fashion statement.','price'=>'90.0','image'=>'storage/images/products/fashion/colorful_boots.jpg','AdImage'=>'//','categoryName'=>'shoes','storeName'=>'fashion store','quantity'=>'15'],
            ['category_id'=>'16','name'=>'Sports Boots','description'=>'Comfortable and durable sports boots, perfect for outdoor activities and sports.','price'=>'70.0','image'=>'storage/images/products/fashion/sports_boots.jpg','AdImage'=>'//','categoryName'=>'shoes','storeName'=>'fashion store','quantity'=>'25'],
            ['category_id'=>'16','name'=>'Winter Boots','description'=>'Warm and waterproof winter boots, perfect for cold and snowy weather.','price'=>'85.0','image'=>'storage/images/products/fashion/winter_boots.jpg','AdImage'=>'//','categoryName'=>'shoes','storeName'=>'fashion store','quantity'=>'18'],
            ['category_id'=>'16','name'=>'White Boots','description'=>'Stylish and warm long white winter boots, perfect for extreme cold weather.','price'=>'95.0','image'=>'storage/images/products/fashion/long_white_winter_boots.jpg','AdImage'=>'//','categoryName'=>'shoes','storeName'=>'fashion store','quantity'=>'12'],
            ['category_id'=>'16','name'=>'Women Heels','description'=>'Elegant and stylish women heels, perfect for formal occasions and parties.','price'=>'65.0','image'=>'storage/images/products/fashion/womens_heels.jpg','AdImage'=>'//','categoryName'=>'shoes','storeName'=>'fashion store','quantity'=>'30'],
            ['category_id'=>'16','name'=>'Cute Boots','description'=>'Adorable and stylish boots, perfect for adding a touch of charm to your outfit.','price'=>'75.0','image'=>'storage/images/products/fashion/cute_boots.jpg','AdImage'=>'//','categoryName'=>'shoes','storeName'=>'fashion store','quantity'=>'22'],
            ['category_id'=>'16','name'=>'Boots Wheels','description'=>'Fun and practical boots with hidden wheels, perfect for a unique and playful experience.','price'=>'100.0','image'=>'storage/images/products/fashion/boots_with_wheels.jpg','AdImage'=>'//','categoryName'=>'shoes','storeName'=>'fashion store','quantity'=>'10'],




            ['category_id'=>'17','name'=>'Sweater','description'=>'Lightweight and stylish brown summer sweater, perfect for casual summer outings.','price'=>'45.0','image'=>'storage/images/products/fashion/brown_summer_sweater.jpg','AdImage'=>'//','categoryName'=>'men','storeName'=>'fashion store','quantity'=>'40'],
            ['category_id'=>'17','name'=>'White Summer Sweater','description'=>'Lightweight and stylish white summer sweater, perfect for casual summer outings.','price'=>'45.0','image'=>'storage/images/products/fashion/white_summer_sweater.jpg','AdImage'=>'//','categoryName'=>'men','storeName'=>'fashion store','quantity'=>'40'],
            ['category_id'=>'17','name'=>'Men Shirt','description'=>'Classic and elegant men shirt, perfect for formal and casual occasions.','price'=>'50.0','image'=>'storage/images/products/men/mens_shirt.jpg','AdImage'=>'//','categoryName'=>'men','storeName'=>'fashion store','quantity'=>'35'],
            ['category_id'=>'17','name'=>' Sweater','description'=>'Warm and stylish men sweater, perfect for cold weather and casual outings.','price'=>'55.0','image'=>'storage/images/products/fashion/mens_sweater.jpg','AdImage'=>'//','categoryName'=>'men','storeName'=>'fashion store','quantity'=>'30'],
            ['category_id'=>'17','name'=>'Jacket','description'=>'Stylish and durable men jacket, perfect for cold weather and outdoor activities.','price'=>'90.0','image'=>'storage/images/products/fashion/mens_jacket.jpg','AdImage'=>'//','categoryName'=>'men','storeName'=>'fashion store','quantity'=>'20'],
            ['category_id'=>'17','name'=>'Sports Sweater','description'=>'Comfortable and breathable sports sweater, perfect for workouts and casual wear.','price'=>'40.0','image'=>'storage/images/products/fashion/sports_sweater.jpg','AdImage'=>'//','categoryName'=>'men','storeName'=>'fashion store','quantity'=>'25'],



            ['category_id'=>'18','name'=>'Handbag','description'=>'Elegant and stylish women handbag, perfect for daily use and special occasions.','price'=>'70.0','image'=>'storage/images/products/fashion/womens_handbag.jpg','AdImage'=>'//','categoryName'=>'bag','storeName'=>'fashion store','quantity'=>'15'],
            ['category_id'=>'18','name'=>'Backpack','description'=>'Durable and spacious backpack, perfect for school, travel, and daily use.','price'=>'50.0','image'=>'storage/images/products/fashion/backpack.jpg','AdImage'=>'//','categoryName'=>'bag','storeName'=>'fashion store','quantity'=>'20'],
            ['category_id'=>'18','name'=>'Backpack','description'=>'Stylish and spacious white backpack, perfect for school, travel, and daily use.','price'=>'50.0','image'=>'storage/images/products/fashion/white_backpack.jpg','AdImage'=>'//','categoryName'=>'bag','storeName'=>'fashion store','quantity'=>'20'],
            ['category_id'=>'18','name'=>'Suitcase','description'=>'Durable and spacious suitcase, perfect for travel and storage.','price'=>'120.0','image'=>'storage/images/products/fashion/suitcase.jpg','AdImage'=>'//','categoryName'=>'bag','storeName'=>'fashion store','quantity'=>'10'],
            ['category_id'=>'18','name'=>'Brown Handbag','description'=>'Elegant and stylish brown handbag, perfect for daily use and special occasions.','price'=>'65.0','image'=>'storage/images/products/fashion/brown_handbag.jpg','AdImage'=>'//','categoryName'=>'bag','storeName'=>'fashion store','quantity'=>'18'],
            ['category_id'=>'18','name'=>'Bag Set','description'=>'A stylish set of bags, perfect for various occasions and daily use.','price'=>'150.0','image'=>'storage/images/products/fashion/bag_set.jpg','AdImage'=>'//','categoryName'=>'bag','storeName'=>'fashion store','quantity'=>'12'],



            ['category_id'=>'19','name'=>'Baby Dress','description'=>'Adorable and comfortable baby dress, perfect for special occasions and daily wear.','price'=>'30.0','image'=>'storage/images/products/fashion/baby_dress.jpg','AdImage'=>'//','categoryName'=>'baby','storeName'=>'fashion store','quantity'=>'25'],
            ['category_id'=>'19','name'=>'Baby Outfit','description'=>'Adorable and comfortable baby outfit, perfect for daily wear and special occasions.','price'=>'35.0','image'=>'storage/images/products/fashion/baby_outfit.jpg','AdImage'=>'//','categoryName'=>'baby','storeName'=>'fashion store','quantity'=>'20'],
            ['category_id'=>'19','name'=>'Baby Pajama','description'=>'Soft and cozy baby pajama, perfect for a comfortable night sleep.','price'=>'25.0','image'=>'storage/images/products/fashion/baby_pajama.jpg','AdImage'=>'//','categoryName'=>'baby','storeName'=>'fashion store','quantity'=>'30'],
            ['category_id'=>'19','name'=>'Baby Pajama','description'=>'Soft and cozy red baby pajama, perfect for a comfortable night sleep.','price'=>'25.0','image'=>'storage/images/products/fashion/red_baby_pajama.jpg','AdImage'=>'//','categoryName'=>'baby','storeName'=>'fashion store','quantity'=>'30'],
            ['category_id'=>'19','name'=>'Baby Dress','description'=>'Adorable and stylish baby dress, perfect for special occasions and daily wear.','price'=>'30.0','image'=>'storage/images/products/fashion/baby_dress2.jpg','AdImage'=>'//','categoryName'=>'baby','storeName'=>'fashion store','quantity'=>'25'],
            ['category_id'=>'19','name'=>'Baby Dress','description'=>'Adorable and elegant baby dress, perfect for special occasions and photoshoots.','price'=>'35.0','image'=>'storage/images/products/fashion/elegant_baby_dress.jpg','AdImage'=>'//','categoryName'=>'baby','storeName'=>'fashion store','quantity'=>'20'],
            ['category_id'=>'19','name'=>'Baby Outfit','description'=>'Adorable and stylish baby girl outfit, perfect for daily wear and special occasions.','price'=>'40.0','image'=>'storage/images/products/fashion/baby_girl_outfit.jpg','AdImage'=>'//','categoryName'=>'baby','storeName'=>'fashion store','quantity'=>'15'],
            ['category_id'=>'19','name'=>'Baby Dress','description'=>'Adorable and stylish baby dress, perfect for special occasions and daily wear.','price'=>'30.0','image'=>'storage/images/products/fashion/baby_dress3.jpg','AdImage'=>'//','categoryName'=>'baby','storeName'=>'fashion store','quantity'=>'25'],



            ];

        foreach ($products as $product){
            Product::create($product);
        }
    }
}
