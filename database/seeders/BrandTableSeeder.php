<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brandRecords=[
            ['id'=>1,'name'=>'Zara','status'=>1],
            ['id'=>2,'name'=>'Defacto','status'=>1],
            ['id'=>3,'name'=>'Lee','status'=>1],
            ['id'=>4,'name'=>'OldNavy','status'=>1],
        ];
        Brand::insert($brandRecords);
    }
}
