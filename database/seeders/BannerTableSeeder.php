<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bannerRecords=[
            ['id'=>1,'image'=>'slide-img1.jpg','title'=>'Be Summer Ready','link'=>'/shop','alert'=>'banner','status'=>'1'],
            ['id'=>2,'image'=>'slide-img2.jpg','title'=>'New Fashion','link'=>'/shop','alert'=>'banner','status'=>'1'],
            ['id'=>3,'image'=>'slide-img3.jpg','title'=>'Amazing Chance!','link'=>'/shop','alert'=>'banner','status'=>'1'],
        ];
        Banner::insert($bannerRecords);
    }

}
