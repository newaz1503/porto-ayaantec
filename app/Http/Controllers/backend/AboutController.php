<?php

namespace App\Http\Controllers\backend;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use App\Http\Requests\AboutRequest;
use Image;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('backend.about.index');
    }
    public function update(AboutRequest $request, $id){
        $about = Setting::find($id);
        $about->about_title = $request->about_title;
        $about->about_description = $request->about_description;

        if ($request->hasFile('about_image')) {
            $photo = $request->file('about_image');
                $old_image_path = public_path().$about->about_image;
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            $image = $request->file('about_image');
            $imageName = time() . '.' . $image->extension();

            $image_path = public_path('uploads/about/');
            $img = Image::make($image->path());
            $img->resize(450, 475)->save($image_path . '/' . $imageName);
            $about->about_image = 'uploads/about/' . $imageName;
        }
        // if($request->hasFile('about_image')){
        //     // $old_image_path = public_path("uploads/about/".$about->about_image);

        //     $photo = $request->file('about_image');
        //         // $old_image_path = public_path().$about->about_image;
        //         // if (file_exists($old_image_path)) {
        //         //     unlink($old_image_path);
        //         // }
        //         $path = 'uploads/about/';
        //         $photoName = date('Ymdhis') . '.' .$photo->getClientOriginalExtension();
        //         $photo->move($path, $photoName);
        //         $data['about_image']='uploads/about/'.$photoName;
        //     }else{
        //         $photoName = $about->about_image;
        //     }
            $about->save();
                Toastr::success('Success', 'About Updated Successfully!!');
                return back();
           
    }
    

}
