<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $couponRecords=[
            'id'=>1,'coupon_option'=>'Manual','coupon_code'=>'test1','categories'=>'1,2',
            'users'=>'ehsan1372d@gmail.com','coupon_type'=>'single','amount_type'=>'Percentage',
            'amount'=>20,'expiry_date'=>'2021-3-2',
            'status'=>1,
        ];
        Coupon::insert($couponRecords);
    }
}
