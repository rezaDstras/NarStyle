<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectionRecord=[
            ['id'=>1,'name'=>'man','status'=>1],
            ['id'=>2,'name'=>'woman','status'=>1],
            ['id'=>3,'name'=>'kids','status'=>1],
        ];
        DB::table('sections')->insert($sectionRecord);

    }
}
