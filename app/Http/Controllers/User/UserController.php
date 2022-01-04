<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
// use Image;

class UserController extends Controller
{
    public function index(){
        return view('user.home');
    }
    public function updateData(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        User::findOrFail(Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'updated_at' => Carbon::now(),
        ]);
        $notification=array(
            'message' => 'Your Profile Updated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function imagePage(){
        return view('user.change_image');
    }

    public function updateImage(Request $request){
        $old_image = $request->old_image;
        if(User::findOrFail(Auth::id())->image == 'frontend/media/avatar.png'){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('frontend/media/'.$name_gen);
            $save_url = 'frontend/media/'.$name_gen;
            User::findOrFail(Auth::id())->update([
                'image' => $save_url
            ]);
            $notification=array(
                'message' => 'Your Profile Updated',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            unlink($old_image);
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('frontend/media/'.$name_gen);
            $save_url = 'frontend/media/'.$name_gen;
            User::findOrFail(Auth::id())->update([
                'image' => $save_url
            ]);
            $notification=array(
                'message' => 'Your Profile Updated',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function userPassword(){
        return view('user.change_password');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'password_confirmation' => 'required|min:8',
        ]);
        $dbPass = Auth::user()->password;
        $currentPass = $request->old_password;
        $newPass = $request->new_password;
        $confirmPass = $request->password_confirmation;

        if(Hash::check($currentPass,$dbPass)){
            if($newPass === $confirmPass){
                User::findOrFail(Auth::id())->update([
                    'password' => Hash::make($newPass)
                ]);
                Auth::logout();
                $notification=array(
                    'message' => 'Password update Successfully. Now Login With New Password',
                    'alert-type' => 'success'
                );
                return redirect()->route('login')->with($notification);

            }else{
                $notification=array(
                'message' => 'New Password And Confirm Password Does not Match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
            }
        }else{
            $notification=array(
                'message' => 'Old Password Does not Match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }


}
