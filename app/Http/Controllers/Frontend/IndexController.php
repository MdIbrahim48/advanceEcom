<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $sliders = Slider::where('status',1)->orderBy('id','desc')->limit(5)->get();
        $products = Product::where('status',1)->orderBy('id','desc')->get();
        $featureds = Product::where('featured','1')->where('status',1)->orderBy('id','desc')->get();
        $hot_deals	 = Product::where('hot_deals','1')->where('status',1)->orderBy('id','desc')->get();
        $speacialOffers = Product::where('speacial_offer','1')->where('discount_price','!=',null)->where('status',1)->orderBy('id','desc')->get();
        $speacialDeals = Product::where('speacial_deals','1')->where('status',1)->orderBy('id','desc')->get();

        $skip_category_1 = Category::skip(1)->first();
        $skip_product_1 = Product::where('category_id',$skip_category_1->id)->where('status',1)->get();

        $skip_brand_1 = Brand::skip(2)->first();
        $skip_brand_product_1 = Product::where('brand_id',$skip_brand_1->id)->where('status',1)->get();
        return view('frontend.index',[
            'categories' => $categories,
            'sliders' => $sliders,
            'products' => $products,
            'featureds' => $featureds,
            'hot_deals' => $hot_deals,
            'speacialOffers' => $speacialOffers,
            'speacialDeals' => $speacialDeals,
            'skip_category_1' => $skip_category_1,
            'skip_product_1' => $skip_product_1,
            'skip_brand_1' => $skip_brand_1,
            'skip_brand_product_1' => $skip_brand_product_1,
        ]);
    }

// productDetails
    public function productDetails($id,$slug){
        $product = Product::where('id',$id)->first();

        $color_en = $product->product_color_en;
        $product_color_en = explode(',',$color_en);

        $color_bn = $product->product_color_bn;
        $product_color_bn = explode(',',$color_bn);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',',$size_en);

        $size_bn = $product->product_size_bn;
        $product_size_bn = explode(',',$size_bn);


        $multiImg = MultiImg::where('product_id',$product->id)->get();

        $relatedProducts = Product::where('category_id',$product->category_id)->where('id','!=',$product->id)->orderBy('id','desc')->get();

        return view('frontend.single_product',[
            'product' => $product,
            'multiImg' => $multiImg,
            'product_color_en' => $product_color_en,
            'product_color_bn' => $product_color_bn,
            'product_size_en' => $product_size_en,
            'product_size_bn' => $product_size_bn,
            'relatedProducts' => $relatedProducts,
        ]);
    }

    // tagWiseProduct
    public function tagWiseProduct($tag){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $products = Product::where('product_tags_en',$tag)->orWhere('product_tags_bn',$tag)->where('status',1)->orderBy('id','desc')->get();
        return view('frontend.tag-wise-product',[
            'products' => $products,
            'categories' => $categories,
        ]);
    }
    // subCatWiseProduct
    public function subCatWiseProduct($id,$slug){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $products = Product::where('status',1)->where('subcategory_id',$id)->orderBy('id','desc')->get();
        return view('frontend.sub_category_product',[
            'products' => $products,
            'categories' => $categories,
        ]);
    }
    // subCatWiseProduct
    public function subSubCatWiseProduct($id,$slug){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $products = Product::where('status',1)->where('subsubcategory_id',$id)->orderBy('id','desc')->get();
        return view('frontend.sub_category_product',[
            'products' => $products,
            'categories' => $categories,
        ]);
    }


    // productViewModal
    public function productViewModal($id){
        $product = Product::where('id',$id)->first();
        $color = $product->product_color_en;
        $product_color = explode(',',$color);

        $size = $product->product_size_en;
        $product_size = explode(',',$size);

        return response()->json([
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ]);


    }

}
