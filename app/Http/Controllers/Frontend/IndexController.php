<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $sliders = Slider::where('status',1)->orderBy('id','desc')->limit(5)->get();
        $products = Product::where('status',1)->orderBy('id','desc')->get();
        return view('frontend.index',[
            'categories' => $categories,
            'sliders' => $sliders,
            'products' => $products,
        ]);
    }
}
