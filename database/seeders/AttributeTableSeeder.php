<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributeRecords=[
            ['id'=>1,'product_id'=>1,'size'=>'Small','price'=>50,'stock'=>10,'sku'=>'BM1','status'=>1],
            ['id'=>2,'product_id'=>1,'size'=>'Medium','price'=>100,'stock'=>20,'sku'=>'BM2','status'=>1],
            ['id'=>3,'product_id'=>1,'size'=>'Large','price'=>150,'stock'=>30,'sku'=>'BM3','status'=>1],
        ];
        DB::table('attributes')->insert($attributeRecords);
    }
}
