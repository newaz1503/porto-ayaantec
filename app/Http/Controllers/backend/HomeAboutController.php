<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\HomeInfo;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Image;

class HomeAboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['home_info'] = HomeInfo::latest()->first();
        return view('backend.home.about.index')->with($data);
    }
    public function abouttoptext(Request $request){
        $home_info = HomeInfo::first();
        $home_info->about_top_text = $request->about_top_text;
        $home_info->save();
        Toastr::success('Success', 'About Top Text Updated Successfully');
        return back();
    
    }
    public function founderupdate(Request $request){
        $home_info = HomeInfo::first();
        if ($request->about_name && $request->description) {
            $home_info->about_name = $request->about_name;
            $home_info->description = $request->description;

            if ($request->hasFile('img')) {
                $this->validate($request, [
                    'img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                ]);
                $image_old_path = public_path($home_info->img);
                if (file_exists($image_old_path)) {
                    unlink($image_old_path);
                }
    
                $image = $request->file('img');
                $imageName = time().'.'.$image->extension();
               
                $destinationPathThumbnail = public_path('/uploads/home/about/');
                $img = Image::make($image->path());
                $img->resize(285, 417)->save($destinationPathThumbnail.'/'.$imageName);
             
    
                $home_info->img = '/uploads/home/about/'.$imageName;
            }
            $home_info->save();
        }
        else if ($request->about_name2 && $request->description2) {
            $home_info->about_name2 = $request->about_name2;
            $home_info->description2 = $request->description2;
            if ($request->hasFile('img2')) {
            $image_old_path = public_path($home_info->img2);
            if (file_exists($image_old_path)) {
                unlink($image_old_path);
            }

            $image = $request->file('img2');
            $imageName = time().'.'.$image->extension();
           
            $destinationPathThumbnail = public_path('/uploads/home/about/');
            $img = Image::make($image->path());
            $img->resize(472, 352, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPathThumbnail.'/'.$imageName);

            $home_info->img2 = '/uploads/home/about/'.$imageName;
        }
            $home_info->save();
            
        }
        else if ($request->about_name3 && $request->description3) {
            $home_info->about_name3 = $request->about_name3;
            $home_info->description3 = $request->description3;
            if ($request->hasFile('img3')) {
            $this->validate($request, [
                'img3' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $image_old_path = public_path($home_info->img3);
            if (file_exists($image_old_path)) {
                unlink($image_old_path);
            }

            $image = $request->file('img3');
            $imageName = time().'.'.$image->extension();
           
            $destinationPathThumbnail = public_path('/uploads/home/about/');
            $img = Image::make($image->path());
            $img->resize(270, 170, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPathThumbnail.'/'.$imageName);
         

            $home_info->img3 = '/uploads/home/about/'.$imageName;
        }
        }
        $home_info->save();
        Toastr::success('Success', 'About Updated Successfully');
        return back();
    }

    public function overviewupdate(Request $request){
        $home_info = HomeInfo::first();
        if ($request->over_view_title && $request->over_view_description) {
            $home_info->over_view_title = $request->over_view_title;
            $home_info->over_view_description = $request->over_view_description;
            $home_info->over_view_link = $request->over_view_link;

            if ($request->hasFile('over_view_pdf')) {
                $this->validate($request, [
                    'over_view_pdf' => 'required|mimes:pdf|max:10000',
                ]);
                $image_old_path = public_path($home_info->over_view_pdf);
                if (file_exists($image_old_path)) {
                    unlink($image_old_path);
                }
    
                $file = $request->file('over_view_pdf');
            $filename = time() . '.' . $request->file('over_view_pdf')->extension();
            $filePath = public_path() . '/uploads/home/about/';
            $file->move($filePath,$filename);
    
                $home_info->over_view_pdf = '/uploads/home/about/'.$filename;
            }
            $home_info->save();
        }
        Toastr::success('Success', 'About Over view Updated Successfully');
            return back();
    }

}
