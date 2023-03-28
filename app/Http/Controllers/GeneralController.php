<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use Image;

class GeneralController extends Controller
{
    public function generalinformation(){
        $data['general'] = Setting::select('number','email','address','name','copyright','contact_info','fav_icon','logo')->first();
        return view('backend.setting.general.index')->with($data);
    }

    function updateAddress(Request $request){
        $data = Setting::latest()->first();
        $r = $data->update($request->all());
        if($r){
            return redirect(route('backend.general.info'));
        }
    }
    function updateContact(Request $request){
        $data = Setting::latest()->first();
        $r = $data->update($request->all());
        if($r){
            return redirect(route('backend.general.info'));
        }
    }
    function updateEmail(Request $request){
        $data = Setting::latest()->first();
        $r = $data->update($request->all());
        if($r){
            return redirect(route('backend.general.info'));
        }
    }
    function updateContactInfo(Request $request){
        // dd($request);
        $data = Setting::latest()->first();
        $r = $data->update($request->all());
        if($r){
            return redirect(route('backend.general.info'));
        }
    }
    function updateCopyRight(Request $request){
        
        $data = Setting::latest()->first();
        $r = $data->update($request->all());
        if($r){
            return redirect(route('backend.general.info'));
        }
    }
    function updatename(Request $request){
        
        $data = Setting::latest()->first();
        $r = $data->update($request->all());
        if($r){
            return redirect(route('backend.general.info'));
        }
    }
    function adminProfile(){
        $admin = Auth::user();
        // dd($admin);
        $general = Setting::latest()->first();
        return view('backend.setting.general.adminProfile',compact('general','admin'));
    }
    function passwordReset(Request $request){
        $oldPassword = Hash::make($request->old_password);
        $password = Auth::user()->password;
        if($oldPassword===$password){
            $this->validate($request, [
                'password' => 'min:8',
                'password_confirmation' => 'required_with:password|same:password|min:6'
                ]);
                $id = Auth::user()->id;
                $user = User::find($id);
              $r =  $user->update($request->password);
              if($r){
             
                return redirect(route('backend.adminProfile'));
              }
        }else{
            Toastr::error('error','Old Password Is Wrong');
            return redirect(route('backend.adminProfile'));
        }
        
    }
    function updateAdminEmail(Request $request){
        $id = Auth::user()->id;
        $user = User::find($id);
        $r =  $user->update($request->all());
        if($r){
            return redirect(route('backend.adminProfile'));
          }
    }
    function updateAdminName(Request $request){
        $id = Auth::user()->id;
        $user = User::find($id);
        $r =  $user->update($request->all());
        if($r){
            return redirect(route('backend.adminProfile'));
          }
    }
    function updateAdminPhoto(Request $request){
        $id = Auth::user()->id;
        $user = User::find($id);
        if($request->file('photo')){
            $photo = $request->file('photo');
            $path ='uploads/home/admin/';
            $name = Auth::user()->name.date('Ymdhis').'.'.$photo->getClientOriginalExtension();
            $photo->move($path,$name);
            $array['photo'] = $name; 
            $r =  $user->update($array);
            if($r){
                return redirect(route('backend.adminProfile'));
              }
        }
    }
    function cv(Request $request){
        $cv = Setting::latest()->first();
        if($request->file('cv')){
            $image_path = public_path($cv->cv);
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            $photo = $request->file('cv');
            $path ='uploads/cv/';
            $name = 'porto-cv.'.$photo->getClientOriginalExtension();
            $photo->move($path,$name);
            $array['cv'] = $name; 
            $cv->cv = $path.$name;
            $cv->save();
            Toastr::success('Success', 'Cv Updated Successfully!!');
            return back(); 

        }
    }
    function meta(Request $request,$id){

        
        $setting = Setting::first();
        $setting->meta_author = $request->meta_author;
        
        $tags = explode(',',$request->meta_tage);

        $setting->meta_keywords = json_encode($tags);
        $setting->meta_description = $request->meta_description;
        if ($request->hasFile('meta_photo')) {
            $image_path = public_path($setting->meta_photo);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $image = $request->file('meta_photo');
            $imageName = time() . '.' . $image->extension();

            $image_path = public_path('uploads/meta/');
            $img = Image::make($image->path());
            $img->resize(350, 350, function ($constraint) {
                $constraint->aspectRatio();
            })->save($image_path . '/' . $imageName);
            $setting->meta_photo = 'uploads/meta/' . $imageName;
        }
        
        $setting->save();
        Toastr::success('Success', 'Meta Information Updated Successfully!!');
        return back(); 
    }
    public function calendly(Request $request,$id){
        $setting = Setting::first();
        $setting->calendly_button_name = $request->calendly_button_name;
        $setting->calendly_code = $request->calendly_code;
        $setting->save();
        Toastr::success('Success', 'Calendly Information Updated Successfully!!');
        return back(); 

    }
}
