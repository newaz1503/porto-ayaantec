<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMedia;
use Brian2694\Toastr\Facades\Toastr;

class SocialMediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data['socials'] = SocialMedia::latest()->get();
        return view('backend.setting.socialmedia.index')->with($data);
    }
  

    public function update(Request $request,$id){
        $socialmedia = SocialMedia::find($id);
        $socialmedia->link = $request->link;
        $socialmedia->update();
        Toastr::success('Success', 'Social Media Updated Successfully');
        return back();
    }
    public function status($id)
    {
        $socialmedia = SocialMedia::find($id);
        if ($socialmedia->status == 'On') {
            $socialmedia->status = 'Off';
        } else {
            $socialmedia->status = 'On';
        }
        $socialmedia->save();
        Toastr::success('Success', 'Social Media Updated Successfully');
        return back();
    }
}
