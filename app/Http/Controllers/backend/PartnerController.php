<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Image;
use Auth;

class PartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['partners'] = Partner::latest()->paginate();
        return view('backend.partner.index')->with($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'img' => 'required|image|mimes:jpeg,png,jpg,web',
        ]);
        if($request->hasFile('img')){
            $image = $request->file('img');
        $imageName = time().'.'.$image->extension();
       
        $image_path = public_path('uploads/partner/');
        $img = Image::make($image->path());
        $img->resize(120, 70, function ($constraint) {
            $constraint->aspectRatio();
        })->save($image_path.'/'.$imageName);

        $setting = new  Partner();
        $setting->img = 'uploads/partner/'.$imageName;
        $setting->added_by = Auth::id();
        $setting->status = $request->status;
        $setting->save();
        }
        
        Toastr::success('Success', 'Parnter Added Successfully');
        return back();

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $partner = Partner::find($id);
        
            

        if($request->hasFile('img')){
                $old_image_path = public_path($partner->img);
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
            $image = $request->file('img');
            $imageName = time().'.'.$image->extension();
        
            $image_path = public_path('uploads/partner/');
            $img = Image::make($image->path());
            $img->resize(120, 70, function ($constraint) {
                $constraint->aspectRatio();
            })->save($image_path.'/'.$imageName);
        
            $partner->img = 'uploads/partner/'.$imageName;
            } 
            $partner->status = $request->status;
            $partner->save();
            Toastr::success('Success', 'Parnter Updated Successfully!!');
            return back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $partner =  Partner::findOrFail($id);
       $image_path = public_path($partner->img);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $partner->delete();
            Toastr::error('Success', 'Parnter Deleted Successfully!!');
            return back(); 
    }
    public function status($id)
    {
        $socialmedia = Partner::find($id);
        if ($socialmedia->status == 'On') {
            $socialmedia->status = 'Off';
        } else {
            $socialmedia->status = 'On';
        }
        $socialmedia->save();
        Toastr::success('Success', 'Partner Updated Successfully');
        return back();
    }
}
