<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubsubCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function addProduct(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.product.create',[
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }

    public function getSubSubCat($subcatId){
       $SubsubCategory = SubsubCategory::where('subcategory_id',$subcatId)->orderBy('subsubcategory_name_en','ASC')->get();
        return response()->json($SubsubCategory);
    }

    public function storeProduct(Request $request){

        $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_id' => 'required',
            'product_name_en' => 'required',
            'product_name_bn' => 'required',
            'product_code' => 'required',
            'product_qty' => 'required',
            'product_color_en' => 'required',
            'product_color_bn' => 'required',
            'short_descp_en' => 'required',
            'short_descp_bn' => 'required',
            'long_descp_en' => 'required',
            'long_descp_bn' => 'required',
        ]);

        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('uploads/products/thumbnail/'.$name_gen);
        $save_url = 'uploads/products/thumbnail/'.$name_gen;

        $product = Product::create([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_slug_en' => strtolower(str_replace(' ','_',$request->product_name_en)),
            'product_name_bn' => $request->product_name_bn,
            'product_slug_bn' => strtolower(str_replace(' ','_',$request->product_name_bn)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_size_en' => $request->product_size_en,
            'product_size_bn' => $request->product_size_bn,

            'product_tags_en' => $request->product_tags_en,
            'product_tags_bn' => $request->product_tags_bn,
            'product_color_en' => $request->product_color_en,
            'product_color_bn' => $request->product_color_bn,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_bn' => $request->short_descp_bn,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_bn' => $request->long_descp_bn,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'speacial_offer' => $request->speacial_offer,
            'speacial_deals' => $request->speacial_deals,
            'product_thumbnail' => $save_url,
            'status' => 1,
       ]);
        // multiple image upload
        $images = $request->file('photo_name');
        foreach($images as $image){
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('uploads/products/multi-img/'.$name_gen);
            $uploadPath = 'uploads/products/multi-img/'.$name_gen;
            MultiImg::create([
                'product_id' => $product->id,
                'photo_name' => $uploadPath
            ]);
        }
       $notification=array(
            'message' => 'Product Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function index(){
        $products = Product::latest()->get();
        return view('admin.product.index',[
            'products' => $products
        ]);
    }

    public function editProduct($id){
        $product = Product::where('id',$id)->first();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $multiImages = MultiImg::where('product_id',$id)->latest()->get();
        return view('admin.product.edit',[
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands,
            'multiImages' => $multiImages,
        ]);
    }

    public function updateProduct(Request $request , $id){
        $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_id' => 'required',
            'product_name_en' => 'required',
            'product_name_bn' => 'required',
            'product_code' => 'required',
            'product_qty' => 'required',
            'product_color_en' => 'required',
            'product_color_bn' => 'required',
            'short_descp_en' => 'required',
            'short_descp_bn' => 'required',
            'long_descp_en' => 'required',
            'long_descp_bn' => 'required',
        ]);
        Product::where('id',$id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_slug_en' => strtolower(str_replace(' ','_',$request->product_name_en)),
            'product_name_bn' => $request->product_name_bn,
            'product_slug_bn' => strtolower(str_replace(' ','_',$request->product_name_bn)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_size_en' => $request->product_size_en,
            'product_size_bn' => $request->product_size_bn,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bn' => $request->product_tags_bn,
            'product_color_en' => $request->product_color_en,
            'product_color_bn' => $request->product_color_bn,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_bn' => $request->short_descp_bn,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_bn' => $request->long_descp_bn,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'speacial_offer' => $request->speacial_offer,
            'speacial_deals' => $request->speacial_deals,
            'status' => 1,
       ]);
       $notification=array(
            'message' => 'Product Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // ==========Product ============
    public function deleteProduct($id){
        $images = MultiImg::where('product_id',$id)->get();
        if(count($images)>0){
            foreach($images as $image){
                if($image->photo_name != ''  && $image->photo_name != null){
                    $old_file = $image->photo_name;
                    if(file_exists($old_file)){
                        File::delete($old_file);
                    }
                }
            }
        }
        MultiImg::where('product_id',$id)->delete();
        Product::where('id',$id)->delete();
        return back()->with('alert-success','Product Delete Successfully');
    }

    // ==========update Thumbnail ============
    public function updateThumbnail(Request $request){
        $pro_id = $request->product_id;
        $old_image = $request->old_img;
        unlink($old_image);
        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('uploads/products/thumbnail/'.$name_gen);
        $save_url = 'uploads/products/thumbnail/'.$name_gen;
        Product::findOrFail($pro_id)->update([
            'product_thumbnail' => $save_url
        ]);
        $notification=array(
            'message' => 'Product Thumbnail Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    // ==========update MultiImage ============
    public function updateMultiImage(Request $request){
        $imgs = $request->multiimg;
        foreach($imgs as $id=>$img){
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);
            $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('uploads/products/multi-img/'.$name_gen);
            $upload_path = 'uploads/products/multi-img/'.$name_gen;
            MultiImg::where('id',$id)->update([
                'photo_name' => $upload_path,
            ]);
        }
        $notification=array(
            'message' => 'Product Multiple Image Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
// ======= Delete MultiImage ========
    public function deleteMultiImage($id){
        $oldImg = MultiImg::findOrFail($id);
        unlink($oldImg->photo_name);
        MultiImg::findOrFail($id)->delete();
        $notification=array(
            'message' => 'Product Multiple Image Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



}
