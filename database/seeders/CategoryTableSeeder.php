<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryRecords=[
            [
                'id'=>1,'parent_id'=>0,'section_id'=>1,'category_name'=>'T-shirts','parent_discount'=>0,'description'=>'',
                'url'=>'t-shirt','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1,'category_image'=>'',
                ],
            [
                'id'=>2,'parent_id'=>1,'section_id'=>1,'category_name'=>'Casual T-shirts','parent_discount'=>0,'description'=>'',
                'url'=>'casual-t-shirt','meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1,'category_image'=>'',
            ],
        ];
        DB::table('categories')->insert($categoryRecords);
    }
}
