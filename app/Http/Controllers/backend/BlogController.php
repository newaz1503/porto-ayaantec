<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Auth;
use Brian2694\Toastr\Facades\Toastr;
use Image;
use Carbon\Carbon;

class BlogController extends Controller
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
        $data['blogs'] = Blog::latest()->paginate(16);
        return view('backend.blog.index')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $blog = new  Blog();
        if ($request->type == 1) {
            $this->validate($request, [
                'photo' => 'required|image|mimes:jpeg,png,jpg,web',
            ]);
            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $imageName = time() . '.' . $image->extension();
    
                $image_path = public_path('uploads/blog/');
                $img = Image::make($image->path());
                $img->resize(380, 250, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($image_path . '/' . $imageName);
                $blog->photo = 'uploads/blog/' . $imageName;
            }
        } else {
            $blog->link = $request->link;
        }
        
       

        $blog->user_id = Auth::id();
        $blog->type = $request->type;
        $blog->name = $request->name;
        $blog->tage = json_encode($request->tage);
        $blog->description = $request->description;
        $blog->created_at = Carbon::now();
        $blog->save();
        Toastr::success('Success', 'Blog Added Successfully!!');
        return back();
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Blog $blog)
    {
        if ($request->type === 1) {
        if ($request->hasFile('photo')) {
            $this->validate($request, [
                'photo' => 'required|image|mimes:jpeg,png,jpg,web',
            ]);
            if ($blog->type === 1) {
                $old_image_path = public_path($blog->photo);
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }
            
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->extension();

            $image_path = public_path('uploads/blog/');
            $img = Image::make($image->path());
            $img->resize(380, 250, function ($constraint) {
                $constraint->aspectRatio();
            })->save($image_path . '/' . $imageName);
            $blog->photo = 'uploads/blog/' . $imageName;
        }else {
            if ($blog->type === 1) {
                $old_image_path = public_path($blog->photo);
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }
            $blog->link = $request->link;
        }
    }

        $blog->type = $request->type;
        $blog->name = $request->name;
        $blog->tage = json_encode($request->tage);
        $blog->description = $request->description;
        $blog->save();
        Toastr::success('Success', 'Blog Updated Successfully!!');
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
        $blog =  Blog::findOrFail($id);
        $image_path = public_path($blog->photo);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $blog->delete();
        Toastr::error('Success', 'Blog Deleted Successfully!!');
        return back();
    }
}
