<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\BannerRequest;
use App\Models\banner_title;
use App\Models\BannerSlider;
use Carbon\Carbon;

class HomeBannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['sliders'] = BannerSlider::latest()->get();
        $data['titles'] = banner_title::latest()->get();
        return view('backend.banner.index')->with($data);
    }
    function update(BannerRequest $request , $id){
        // dd($request);
        $banner =  Setting::latest()->first();
        $data =[
            'banner_name'=>$request->banner_name,
            'banner_description'=>$request->banner_description,
        ];
        $r = $banner->update($data);
        if($r){
        Toastr::success('Success', 'Banner Updated Successfully!!');
        return back();
        }
    }
    public function slider_store(Request $request){
        $request->validate([
            'photo' => 'required',
        ]);
        $banner_slier =new  BannerSlider();
        if($request->file('photo')){
            $photo = $request->file('photo');
            $path = 'uploads/banner/slider/';
            $photoName = date('Ymdhis') . '.' . $photo->getClientOriginalExtension();
            $photo->move($path, $photoName);
            $banner_slier->photo='uploads/banner/slider/'.$photoName;
            $banner_slier->save();
        }
        Toastr::success('Success', 'Banner Slider Created Successfully!!');
        return back();
    }
    public function slider_update(Request $request,$id){
dd($request->all());

        $request->validate([
            'photo' => 'required',
        ]);
        $banner_slier = BannerSlider::find($id);
        if($request->file('photo')){
            $old_image_path = public_path($request->photo);
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
            $photo = $request->file('photo');
            $path = 'uploads/banner/slider/';
            $photoName = date('Ymdhis') . '.' . $photo->getClientOriginalExtension();
            $photo->move($path, $photoName);
            $banner_slier->photo='uploads/banner/slider/'.$photoName;
            $banner_slier->save();
        }
        echo 'done';
        die();
        Toastr::success('Success', 'Banner Slider Updated Successfully!!');
        return back();
    }
    public function slider_delete($id){
        $banner_slier = BannerSlider::find($id);
            $old_image_path = public_path($banner_slier->photo);
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
            $banner_slier->delete();
        Toastr::success('Success', 'Banner Slider Deleted Successfully!!');
        return back();
    }

    public function title_store(Request $request){
        $request->validate([
            'title' => 'required | max:255'
        ]);

        banner_title::insert([
            'title' => $request->title,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Success', 'Banner Title Created Successfully!!');
        return back();
    }
    public function title_update(Request $request, $id){
        $request->validate([
            'title' => 'required | max:255'
        ]);

        banner_title::find($id)->update([
            'title' => $request->title,
        ]);
        Toastr::success('Success', 'Banner Title Updated Successfully!!');
        return back();
    }
    public function title_delete($id){
        banner_title::find($id)->delete();
        Toastr::success('Success', 'Banner Title Deleted Successfully!!');
        return back();
    }
}
