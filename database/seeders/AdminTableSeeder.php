<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        $adminRecords=[
          [
            'id'=>1,'name'=>'admin','type'=>'admin','password'=>'$2y$10$E4mpgoe78L82JiAfwgaqnOKUJY.7kiC04cdAcupp/tLS4VM0SyIxG',
            'mobile'=>'09000000000','status'=>1,'email'=>'a@a.com','image'=>''
          ],
            [
                'id'=>2,'name'=>'smart','type'=>'subadmin','password'=>'$2y$10$E4mpgoe78L82JiAfwgaqnOKUJY.7kiC04cdAcupp/tLS4VM0SyIxG',
                'mobile'=>'09000000000','status'=>1,'email'=>'b@b.com','image'=>''
            ],
            [
                'id'=>3,'name'=>'david','type'=>'admin','password'=>'$2y$10$E4mpgoe78L82JiAfwgaqnOKUJY.7kiC04cdAcupp/tLS4VM0SyIxG',
                'mobile'=>'09000000000','status'=>1,'email'=>'c@c.com','image'=>''
            ],
        ];
        //first way to insert in database
        DB::table('admins')->insert($adminRecords);
        //second way to insert in database
//        foreach ($adminRecords as $key=>$record){
//            Admin::create($record);
//        }
    }
}
