<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable =[
        'category_name','section_id','parent_id','category_image',
        'parent_discount','description','status','url','meta_title',
        'meta_description','meta_keywords',
    ];
    //relation for parent_id for showin ajax
    public function subCategories()
    {
        return $this->hasMany(Category::class,'parent_id')->where('status',1);
    }
    //relation for section
    public function section()
    {
        return $this->belongsTo(Section::class,'section_id')->select('id','name');
    }
    //relation for parent category
    public function parentCategory()
    {
        return $this->belongsTo(Category::class,'parent_id')->select('id','category_name');
    }

    //listing categories product
    public static function catDetails ($url)
    {
        $catDetails=Category::with(['subCategories'=>function($query){
            $query->select('id','parent_id','category_name','url')->where('status',1);
        }])->where('url',$url)->first();
        if ($catDetails['parent_id']==0){
            //only show main category in breadcrumb
            $breadcrumbs= '<a href="'.url($catDetails['url']).'">'.$catDetails['category_name'].'</a>';
        }else{
            //show main and sub category in breadcrumb
            $parentCategory=Category::where('id',$catDetails['parent_id'])->first();
            $breadcrumbs= '<a href="'.url($parentCategory['url']).'">'.$parentCategory['category_name'].'</a>&nbsp;<span>/</span>&nbsp;<a href="'.url($catDetails['url']).'">'.$catDetails['category_name'].'</a>';
        }
        $catIds=array();
        $catIds[]=$catDetails['id'];
        foreach ($catDetails['subCategories'] as $key => $subCat){
            $catIds[]=$subCat['id'];
        }
        return array('catIds'=>$catIds,'catDetails'=>$catDetails,'breadcrumbs'=>$breadcrumbs);
    }
}
