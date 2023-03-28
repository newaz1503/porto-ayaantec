<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Image;


class LogoController extends Controller
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
        $data['logo'] = Setting::select('logo', 'fav_icon')->first();

        return view('backend.setting.logo.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {

        if ($request->file('fav_icon')) {
            $this->validate($request, [
                'fav_icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image = $request->file('fav_icon');
            $imageName = time() . '.' . $image->extension();

            $destinationPathThumbnail = public_path('/uploads/setting/logo/');
            $img = Image::make($image->path());
            $img->resize(100, 65, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPathThumbnail . '/' . $imageName);

            $destinationPath = public_path('/uploads/setting/logo/');
            $image->move($destinationPath, $imageName);

            $setting = Setting::latest()->first();
            $setting->fav_icon = '/uploads/setting/logo/' . $imageName;
            $setting->save();
            Toastr::success('Success', 'fav_icon Updated Successfully');
            return back();
        }

        if ($request->file('logo')) {
            $this->validate($request, [
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('logo');
            $imageName = time() . '.' . $image->extension();

            $destinationPathThumbnail = public_path('/uploads/setting/logo/');
            $img = Image::make($image->path());
            $img->resize(100, 50, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPathThumbnail . '/' . $imageName);

            $destinationPath = public_path('/uploads/setting/logo/');
            $image->move($destinationPath, $imageName);

            $setting = Setting::latest()->first();
            $setting->logo = '/uploads/setting/logo/' . $imageName;
            $setting->save();
            Toastr::success('Success', 'Logo Updated Successfully');
            return back();
        }


        Toastr::error('Success', 'Please select a img!!');
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
        //
    }
}
