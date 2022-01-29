<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubsubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        return view('admin.category.index',[
            'categories' => $categories
        ]);
    }
    public function categoryStore(Request $request){
        $request->validate([
            'category_name_en' => 'required',
            'category_name_bn' => 'required',
            'category_icon' => 'required',
        ]);

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_bn' => $request->category_name_bn,
            'category_slug_en' => strtolower(str_replace(' ','_',$request->category_name_en)),
            'category_slug_bn' => str_replace(' ','_',$request->category_name_bn),
            'category_icon' => $request->category_icon,
            'created_at' => Carbon::now(),
        ]);
        $notification=array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function categoryEdit($id){
        $category = Category::where('id',$id)->first();
       return view('admin.category.edit',[
           'category' => $category
       ]);
    }

    public function categoryUpdate(Request $request,$id){
        $request->validate([
            'category_name_en' => 'required',
            'category_name_bn' => 'required',
            'category_icon' => 'required',
        ]);

        Category::where('id',$id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_bn' => $request->category_name_bn,
            'category_slug_en' => strtolower(str_replace(' ','_',$request->category_slug_en)),
            'category_slug_bn' => str_replace(' ','_',$request->category_slug_bn),
            'category_icon' => $request->category_icon,
            'updated_at' => Carbon::now(),
        ]);
        $notification=array(
            'message' => 'Category Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function categoryDelete($id){
        Category::where('id',$id)->delete();
        $notification=array(
            'message' => 'Category Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // =========== Sub Category ==========
    public function subCategoryIndex(){
        $sub_categories = SubCategory::latest()->get();
        $categories = Category::orderBy('category_name_en','asc')->get();
        return view('admin.sub_category.index',[
            'sub_categories' => $sub_categories,
            'categories' => $categories,
        ]);
    }

    public function subCategoryStore(Request $request){
        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_bn' => 'required',
            'category_id' => 'required',
        ],[
            'category_id.required' => 'Select Any Category'
        ]);

        SubCategory::insert([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_bn' => $request->subcategory_name_bn,
            'subcategory_slug_en' => strtolower(str_replace(' ','_',$request->subcategory_name_en)),
            'subcategory_slug_bn' => str_replace(' ','_',$request->subcategory_name_bn),
            'category_id' => $request->category_id,
            'created_at' => Carbon::now(),
        ]);
        $notification=array(
            'message' => 'SubCategory Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function subCategoryEdit($id){
        $subCategory = SubCategory::where('id',$id)->first();
        $categories = Category::orderBy('category_name_en','asc')->get();
        return view('admin.sub_category.edit',[
            'subCategory' => $subCategory,
            'categories' => $categories,
        ]);
    }

    public function subCategoryUpdate(Request $request , $id){
        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_bn' => 'required',
            'category_id' => 'required',
        ],[
            'category_id.required' => 'Select Any Category'
        ]);

        SubCategory::where('id',$id)->update([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_bn' => $request->subcategory_name_bn,
            'subcategory_slug_en' => strtolower(str_replace(' ','_',$request->subcategory_name_en)),
            'subcategory_slug_bn' => str_replace(' ','_',$request->subcategory_name_bn),
            'category_id' => $request->category_id,
            'updated_at' => Carbon::now(),
        ]);
        $notification=array(
            'message' => 'SubCategory Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function subCategoryDelete($id){
        SubCategory::where('id',$id)->delete();
        $notification=array(
            'message' => 'SubCategory Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

   // =========== Sub Sub Category ==========
    public function subSubIndex(){
        $categories = Category::orderBy('category_name_en','asc')->get();
        $subsubCategory = SubsubCategory::latest()->get();
        return view('admin.sub_sub_category.index',[
            'categories' => $categories,
            'subsubCategory' => $subsubCategory,
        ]);
    }

    public function getSubCat($catId){
        $sub_cat = SubCategory::where('category_id',$catId)->orderBy('subcategory_name_en','ASC')->get();
        return response()->json($sub_cat);
    }

    public function subSubStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_bn' => 'required',
        ],[
            'category_id.required' => 'Select Any Category',
            'subcategory_id.required' => 'Select Any SubCategory'
        ]);

        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_bn' => $request->subsubcategory_name_bn,
            'subsubcategory_slug_en' => strtolower(str_replace(' ','_',$request->subsubcategory_name_en)),
            'subsubcategory_slug_bn' => str_replace(' ','_',$request->subsubcategory_name_bn),
            'created_at' => Carbon::now(),
        ]);
        $notification=array(
            'message' => 'Sub SubCategory Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function subSubEdit($id){
        $subsubCategory = SubsubCategory::where('id',$id)->first();
        return view('admin.sub_sub_category.edit',[
            'subsubCategory' => $subsubCategory,
        ]);
    }

    public function subSubUpdate(Request $request ,$id){
        $request->validate([
            // 'category_id' => 'required',
            // 'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_bn' => 'required',
        ],[
            'category_id.required' => 'Select Any Category',
            'subcategory_id.required' => 'Select Any SubCategory'
        ]);

        SubSubCategory::where('id',$id)->update([
            // 'category_id' => $request->category_id,
            // 'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_bn' => $request->subsubcategory_name_bn,
            'subsubcategory_slug_en' => strtolower(str_replace(' ','_',$request->subsubcategory_name_en)),
            'subsubcategory_slug_bn' => str_replace(' ','_',$request->subsubcategory_name_bn),
            'updated_at' => Carbon::now(),
        ]);
        $notification=array(
            'message' => 'Sub SubCategory Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function subSubDelete($id){
       SubsubCategory::where('id',$id)->delete();
        $notification=array(
            'message' => 'Sub SubCategory Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



}
