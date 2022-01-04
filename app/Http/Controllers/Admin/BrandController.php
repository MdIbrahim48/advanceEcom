<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::latest()->get();
        return view('admin.brand.index',[
           'brands' => $brands
        ]);
    }

    public function brandStore(Request $request){
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_bn' => 'required',
            'brand_image' => 'required',
        ],[
            'brand_name_en.required' => 'Input English Brand Name',
            'brand_name_bn.required' => 'Input Bangla Brand Name',
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(166,100)->save('uploads/brand/'.$name_gen);
        $save_url = 'uploads/brand/'.$name_gen;
        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_bn' => $request->brand_name_bn,
            'brand_slug_en' => strtolower(str_replace(' ','_',$request->brand_name_en)),
            'brand_slug_bn' => str_replace(' ','_',$request->brand_name_bn),
            'brand_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        $notification=array(
            'message' => 'Brand Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function brandEdit($id){
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit',[
            'brand' => $brand
        ]);
    }

    public function brandUpdate(Request $request , $id){
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_bn' => 'required',
        ],[
            'brand_name_en.required' => 'Input English Brand Name',
            'brand_name_bn.required' => 'Input Bangla Brand Name',
        ]);

        $old_img = $request->old_image;

        if($request->has('brand_image')){
            unlink($old_img);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(166,100)->save('uploads/brand/'.$name_gen);
            $save_url = 'uploads/brand/'.$name_gen;
            Brand::findOrFail($id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_bn' => $request->brand_name_bn,
                'brand_slug_en' => strtolower(str_replace(' ','_',$request->brand_name_en)),
                'brand_slug_bn' => str_replace(' ','_',$request->brand_name_bn),
                'brand_image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
            $notification=array(
                'message' => 'Brand Update Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }else{
            Brand::findOrFail($id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_bn' => $request->brand_name_bn,
                'brand_slug_en' => strtolower(str_replace(' ','_',$request->brand_name_en)),
                'brand_slug_bn' => str_replace(' ','_',$request->brand_name_bn),
                'updated_at' => Carbon::now(),
            ]);
            $notification=array(
                'message' => 'Brand Update Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('brands')->with($notification);
        }


    }

    public function brandDelete($id){
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        unlink($img);
        Brand::findOrFail($id)->delete();
        $notification=array(
            'message' => 'Brand Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



}
