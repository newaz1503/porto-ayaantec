<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['users'] = User::latest()->get();
        return view('backend.dashboard.index')->with($data);
    }
    public function user_delete($id)
    {
        $review =  User::find($id);
        $image_path = public_path('uploads/home/admin/'.$review->photo);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $review->delete();
        
        Toastr::error('Success', 'User Deleted Successfully!!');
         return back(); 
    }
}
