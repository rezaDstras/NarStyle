<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(AdminTableSeeder::class);
        // \App\Models\User::factory(10)->create();
        //$this->call(SectionTableSeeder::class);
        //$this->call(CategoryTableSeeder::class);
        //$this->call(ProductTableSeeder::class);
        //$this->call(AttributeTableSeeder::class);
        //$this->call(ProductImageTableSeeder::class);
        //$this->call(BrandTableSeeder::class);
        //$this->call(CouponTableSeeder::class);
        //$this->call(SettingTableSeeder::class);
        //$this->call(CommentTableSeeder::class);
        $this->call(BannerTableSeeder::class);
    }
}
