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
            ['name'=>'Al Amin','address'=>'mazeh','phone'=>'0955422200','logo'=>'//','description'=>'متجر أغذية'],
            ['name'=>'Noura ','address'=>'msaken barzeh','phone'=>'0955422200','logo'=>'//','description'=>'متجر أغذية'],
            ['name'=>'Al hadi','address'=>'mazeh','phone'=>'0938523272','logo'=>'//','description'=>'متجر الكترونيات'],
        ];

        foreach ($stores as $store){
            Store::create($store);
        }
    }
}
