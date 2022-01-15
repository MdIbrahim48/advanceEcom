<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
// use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function active($id){
        Slider::findOrFail($id)->update([
            'status' => 0
        ]);
        $notification=array(
            'message' => 'Slider InActivated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        Slider::findOrFail($id)->update([
            'status' => 1
        ]);
        $notification=array(
            'message' => 'Slider Activated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function index(){
        $sliders = Slider::latest()->get();
        return view('admin.slider.index',[
            'sliders' => $sliders
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'title_en' => 'required',
            'title_bn' => 'required',
            'description_en' => 'required',
            'description_bn' => 'required',
            'image' => 'required',
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(166,100)->save('uploads/slider/'.$name_gen);
        $save_url = 'uploads/slider/'.$name_gen;
        Slider::create([
            'title_en' => $request->title_en,
            'title_bn' => $request->title_bn,
            'description_en' => $request->description_en,
            'description_bn' => $request->description_bn,
            'image' => $save_url,
        ]);
        $notification=array(
            'message' => 'Slider Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function edit($id){
        $slider = Slider::where('id',$id)->first();
        return view('admin.slider.edit',[
            'slider' => $slider,
        ]);
    }

    public function update(Request $request ,$id){
        $request->validate([
            'title_en' => 'required',
            'title_bn' => 'required',
            'description_en' => 'required',
            'description_bn' => 'required',
        ]);
        $old_img = $request->old_image;
        if($request->has('image')){
            unlink($old_img);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(166,100)->save('uploads/slider/'.$name_gen);
            $save_url = 'uploads/slider/'.$name_gen;
            Slider::where('id',$id)->update([
                'title_en' => $request->title_en,
                'title_bn' => $request->title_bn,
                'description_en' => $request->description_en,
                'description_bn' => $request->description_bn,
                'image' => $save_url,
            ]);
            $notification=array(
                'message' => 'Slider Update Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            Slider::where('id',$id)->update([
                'title_en' => $request->title_en,
                'title_bn' => $request->title_bn,
                'description_en' => $request->description_en,
                'description_bn' => $request->description_bn,
            ]);
            $notification=array(
                'message' => 'Slider Update Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }

    }

    public function delete($id){
        $slider = Slider::where('id',$id)->first();
        $img = $slider->image;
        unlink($img);
        $slider->delete();
        $notification=array(
            'message' => 'Slider Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


}
