<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Image;

class ReviewController extends Controller
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
        $data['reviews'] = Review::latest()->get();
        return view('backend.review.index')->with($data);
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
        $review = new  Review();
        $this->validate($request, [
            'photo' => 'required|image|mimes:jpeg,png,jpg,web',
        ]);
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->extension();

            $image_path = public_path('uploads/review/');
            $img = Image::make($image->path());
            $img->resize(155, 155, function ($constraint) {
                $constraint->aspectRatio();
            })->save($image_path . '/' . $imageName);
            $review->photo = 'uploads/review/' . $imageName;
        }

        // screenshot upload
        if ($request->hasFile('review_photo')) {
            $image = $request->file('review_photo');
            $imageName = time() . '.' . $image->extension();

            $image_path = public_path('uploads/review/scheetshot');
            $img = Image::make($image->path());
            $img->resize(350, 90, function ($constraint) {
                $constraint->aspectRatio();
            })->save($image_path . '/' . $imageName);

            $review->review_photo = 'uploads/review/scheetshot/' . $imageName;
        }

        $review->type = $request->type;
        $review->name = $request->name;
        $review->title = $request->title;
        $review->review_text = $request->review_text;
        $review->save();
        Toastr::success('Success', 'Parnter Deleted Successfully!!');
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
    public function update(Request $request, $id)
    {
        $review = Review::find($id);
       
        if ($request->hasFile('photo')) {
            $image_path = public_path($review->photo);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->extension();

            $image_path = public_path('uploads/review/');
            $img = Image::make($image->path());
            $img->resize(350, 90, function ($constraint) {
                $constraint->aspectRatio();
            })->save($image_path . '/' . $imageName);
            $review->photo = 'uploads/review/' . $imageName;
        }

        // screenshot upload
        if ($request->hasFile('review_photo')) {
            $image_path = public_path($review->review_photo);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $image = $request->file('review_photo');
            dd($image);
            $imageName = time() . '.' . $image->extension();

            $image_path = public_path('uploads/review/scheetshot');
            $img = Image::make($image->path());
            $img->resize(350, 90, function ($constraint) {
                $constraint->aspectRatio();
            })->save($image_path . '/' . $imageName);
            $review->review_photo = 'uploads/review/scheetshot/' . $imageName;
        }

        $review->type = $request->type;
        $review->name = $request->name;
        $review->title = $request->title;
        $review->review_text = $request->review_text;
        dd($review);
        $review->save();
        echo 'done';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review =  Review::findOrFail($id);
        $image_path = public_path($review->photo);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $image_path = public_path($review->review_photo);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $review->delete();
        Toastr::error('Success', 'Parnter Deleted Successfully!!');
        return back();
    }
}
