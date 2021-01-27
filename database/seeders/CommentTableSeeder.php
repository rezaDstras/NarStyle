<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commentRecord=[
            'id'=>1,'user_id'=>2,'product_id'=>1,'price'=>4,'value'=>2,'quality'=>5,
            'comment'=>'it is very amazing for having it,I really tend to buy it for me and my sister.im soo happy',
        ];
        DB::table('comments')->insert($commentRecord);
    }
}
