<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function index()
    {
        Session::put('page','category');
        //this category has many section_id that creating relation in category model with section function --subsection--
        //this category has many parent_id that creating relation in category model with parentCategory function --subParent--
        $category=Category::with('parentCategory','section')->get()->all();
        return view('admin.category.index',compact('category'));
    }

    public function updateCategoryStatus(Request $request)
    {
        if ($request->ajax()){
            $data=$request->all();
            //NOTICE
            // set URL in verifyCsrfToken
            if ($request['status']=="active"){
                $status="0";
            }else{
                $status="1";
            }
            Category::where('id',$data['category_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'category_id'=>$data['category_id']]);
        }
    }

    public function addEditCategory(Request $request,Category $category=null)
    {
        if ($category==""){
            $title="Add Category";
            $category= new Category;
            $categoryData=array();
            $getCategories=array();
            $message='category has been added successfully';
        }else{
            $title="Edit Category";
            $categoryData=Category::where('id',$category['id'])->first();
            $getCategories=Category::with('subCategories')->where(['parent_id'=>0,'section_id'=>$categoryData['section_id']])->get();
//            echo "<pre>"; print_r($categoryData); die();
            //update category
            $category = Category::find($category['id']);
            $message='category has been updated successfully';
        }
        if ($request->isMethod('post')){
            $data=$request->all();
//            echo "<pre>"; print_r($data); die();
            //upload image
            if ($request->hasFile('category_image')) {
                $image_tmp = $request->file('category_image');
                if ($image_tmp->isValid()) {
                    //get image extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    //generate new name
                    $imageName = rand(11, 999999) . '.' . $extension;
                    $imagePath = 'admin/images/category_image/'.$imageName;
                }
                //upload the file
                Image::make($image_tmp)->resize(980,455)->save($imagePath);
            }
            $rules=[
                //validate with space in name
                'parent_id'=>'required',
                'section_id'=>'required|numeric',
                'category_name'=>'required',
                'parent_discount'=>'required|numeric',
                'description'=>'required',
                'url'=>'required',
                'meta_title'=>'required',
                'meta_description'=>'required',
                'meta_keywords'=>'required',
            ];
            $customMessage=[
                'parent_id.required'=>'parent_id is required',
                'section_id.numeric'=>' valid category is required',
                'section_id.required'=>' valid section_id is required',
                'category_name.required'=>'category_name is required',
                'parent_discount.numeric'=>' valid parent_discount is required',
                'parent_discount.required'=>' valid parent_discount is required',
                'description.required'=>'description is required',
                'url.required'=>' valid url is required',
                'meta_title.required'=>'meta_title is required',
                'meta_keywords.required'=>' valid meta_keywords is required',
            ];
            $this->validate($request,$rules,$customMessage);

            $category->parent_id=$data['parent_id'];
            $category->section_id=$data['section_id'];
            $category->category_name=$data['category_name'];
            $category->parent_discount=$data['parent_discount'];
            $category->description=$data['description'];
            $category->url=$data['url'];
            $category->meta_title=$data['meta_title'];
            $category->meta_description=$data['meta_description'];
            $category->meta_keywords=$data['meta_keywords'];
            $category->status=1;
            if ($request->hasFile('category_image')){
                $category->category_image=$imageName;
            }else{
                $category->category_image="";
            }

            $category->save();
            Session::flash('success_message',$message);
            return redirect()->back();


        }
        $sections=Section::get();
        return view('admin.category.add-edit',compact('title','sections','categoryData','getCategories'));
    }

    public function appendCategoryLevel(Request $request)
    {
        if ($request->ajax()){
            $data=$request->all();
            //this category has many parent_id that creating relation in category model with subCategories function
            $getCategories=Category::with('subCategories')->where(['section_id'=>$data['section_id'],'parent_id'=>0,'status'=>1])->get();
            return view('admin.category.level_category',compact('getCategories'));
        }
    }

    public function deleteCategoryImage (Category $category)
    {
        //get category image
        $categoryImage=Category::select('category_image')->where('id',$category['id'])->first();

        //delete category image form category image folder if exists
        if (file_exists($categoryImage->category_image)){
            unlink($categoryImage->category_image);
        }
        //delete category image from database
        Category::where('id',$category['id'])->update(['category_image'=>""]);
        Session::flash('success_message','image has been deleted successfully!');
        return redirect()->back();
    }

    public function deleteCategory(Category $category)
    {
        Category::where('id',$category['id'])->delete();
        return redirect()->back();
    }

}
