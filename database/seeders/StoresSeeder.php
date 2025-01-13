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
            ['name'=>'Al Amin','address'=>'mazeh beside Al-moasat hospital','phone'=>'0955422200','logo'=>'storage/images/stores-logo/Al-Amin-logo.jpg','description'=>'Super market'],
            ['name'=>'Noura ','address'=>'msaken barzeh next to al-naeem garden','phone'=>'0955422200','logo'=>'//','description'=>'Super market'],
            ['name'=>'Al hadi','address'=>'mazeh','phone'=>'0938523272','logo'=>'//','description'=>'متجر الكترونيات'],
            ['name'=>'Al hyat','address'=>'bramkeh','phone'=>'0938523272','logo'=>'//','description'=>'متجر الكترونيات'],

        ];

        foreach ($stores as $store){
            Store::create($store);
        }
    }
}
