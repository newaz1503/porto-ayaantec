<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Image;
use Auth;

class TeamController extends Controller
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
        $data['teams'] = Team::latest()->get();
        return view('backend.about.team.index')->with($data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|max:255',
            'title' => 'required|max:255',
            'status' => 'required|max:255',
            'company_name' => 'required|max:255',
            'description' => 'required|max:1024',
        ]);
        if($request->hasFile('img')){
            $image = $request->file('img');
        $imageName = time().'.'.$image->extension();
       
        $image_path = public_path('uploads/about/team/');
        $img = Image::make($image->path());
        $img->resize(358, 379, function ($constraint) {
            $constraint->aspectRatio();
        })->save($image_path.'/'.$imageName);

        $team = new  Team();
        $team->name = $request->name;
        $team->title = $request->title;
        $team->company_name = $request->company_name;
        $team->description = $request->description;
        $team->status = $request->status;
        $team->added_by = Auth::id();
        $team->img = 'uploads/about/team/'.$imageName;
        $team->save();
        }
        Toastr::success('Success', 'Parnter Added Successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {   
        if($request->hasFile('img')){
                $old_image_path = public_path($team->img);
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
            $image = $request->file('img');
            $imageName = time().'.'.$image->extension();
        
            $image_path = public_path('uploads/about/team/');
            $img = Image::make($image->path());
            $img->resize(358, 379, function ($constraint) {
                $constraint->aspectRatio();
            })->save($image_path.'/'.$imageName);
        
            $team->img = 'uploads/about/team/'.$imageName;
            } 
            
        $team->name = $request->name;
        $team->title = $request->title;
        $team->company_name = $request->company_name;
        $team->description = $request->description;
        $team->status = $request->status;
        $team->added_by = Auth::id();
        $team->save();
            Toastr::success('Success', 'Team Member Updated Successfully!!');
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
        $team = Team::find($id); 
        $old_image_path = public_path($team->img);
        if (file_exists($old_image_path)) {
            unlink($old_image_path);
        }
        $team->delete();
        Toastr::success('Success', 'Team Member Updated Successfully!!');
            return back();
       
    }
    public function status($id){
        $socialmedia = Team::find($id);
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
