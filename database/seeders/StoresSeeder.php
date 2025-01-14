<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores=[
            //1
            ['name'=>'Al Amin','address'=>'mazeh beside Al-moasat hospital','phone'=>'0955422200','logo'=>'storage/images/stores-logo/Al-Amin-logo.jpg','description'=>'Super market'],
           //2
            ['name'=>'Noura ','address'=>'msaken barzeh next to al-naeem garden','phone'=>'0955422200','logo'=>'storage/images/stores-logo/Noura-logo','description'=>'Super market'],
            //3
            ['name'=>'Al hadi','address'=>'bramkeh ','phone'=>'0938523272','logo'=>'storage/images/stores-logo/hadi-logo.jpg','description'=>'market'],
             //4
            ['name'=>'Al hyat','address'=>'bramkeh','phone'=>'0938523272','logo'=>'storage/images/stores-logo/makeup-logo.jpg','description'=>'make up and accessories store'],
            //5
            ['name'=>'Haies store','address'=>'msaken barzeh next to qasioon mall','phone'=>'0955422200','logo'=>'storage/images/stores-logo/smart.jpg','description'=>'Electronics store'],
            //6
            ['name'=>'fashion store','address'=>'msaken barzeh next to qasioon mall','phone'=>'0955422200','logo'=>'storage/images/stores-logo/fashion.jpg','description'=>'Electronics store'],



        ];

        foreach ($stores as $store){
            Store::create($store);
        }
    }
}
