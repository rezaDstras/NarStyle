<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productImageRecords=[
            ['id'=>1,'product_id'=>1,'image'=>'7107.png','status'=>1],
        ];
        ProductImage::insert($productImageRecords);
    }
}
