<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settingRecord=[
            'id'=>1,'shop_title'=>'Narstyle','hotline'=>'+1 123 456 7890',
            'email'=>'narstyle@info.com','logo'=>'',
            'about'=>'Imagine that the world runs right and there’s a place that offers clothing for the whole family and everything it sells has great style and quality at a price you can’t believe. This is NARSTYLE.',
            'address'=>'New York, USA',
            'instagram'=>'#','facebook'=>'#','linkedin'=>'#','rss'=>'#',
            'youtube'=>'#','pinterest'=>'#','google-plus'=>'#','skype'=>'#',
            'vimeo'=>'#',
        ];
        DB::table('settings')->insert($settingRecord);
    }
}
