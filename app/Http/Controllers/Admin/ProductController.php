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


}
