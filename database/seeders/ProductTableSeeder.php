<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productRecords=[
            [
                'id'=>1,'category_id'=>1,'section_id'=>1,'product_name'=>'summer t-shirt',
                'product_code'=>'P002','product_color'=>'red','product_price'=>'85','product_discount'=>'1',
                'product_weight'=>'','product_video'=>'','main_image'=>'',
                'description'=>'','wash_care'=>'','fabric'=>'','pattern'=>'','sleeve'=>'',
                'fit'=>'','occasion'=>'','meta_title'=>'','meta_description'=>'','meta_keywords'=>'',
                'is_featured'=>'Yes','status'=>'1',
            ],
            [
                'id'=>2,'category_id'=>2,'section_id'=>1,'product_name'=>'winter t-shirt',
                'product_code'=>'P003','product_color'=>'blue','product_price'=>'85','product_discount'=>'1',
                'product_weight'=>'','product_video'=>'','main_image'=>'',
                'description'=>'','wash_care'=>'','fabric'=>'','pattern'=>'','sleeve'=>'',
                'fit'=>'','occasion'=>'','meta_title'=>'','meta_description'=>'','meta_keywords'=>'',
                'is_featured'=>'No','status'=>'1',
            ],
        ];
        DB::table('products')->insert($productRecords);
    }
}
