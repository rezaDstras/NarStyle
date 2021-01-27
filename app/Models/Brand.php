<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'name';
    }

    public static function getBrands()
    {
        $getBrands=Brand::where('status',1)->get();
        return $getBrands;
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
