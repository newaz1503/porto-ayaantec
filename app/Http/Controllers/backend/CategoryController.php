<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('backend.category.index');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|string|unique:categories',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->slug =Str::slug($request->name);
        $category->save();
        Toastr::success('Category added Successfully','Success');
        return redirect()->back();
    }
    public function update(Request $request, $id){
        $category = Category::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|string|unique:categories,name,'.$category->id,
        ]);
        $category->name = $request->name;
        $category->slug =Str::slug($request->name);
        $category->save();
        Toastr::success('Category Updated Successfully','Success');
        return redirect()->back();
    }
    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();
        Toastr::success('Category Deleted Successfully','Success');
        return redirect()->back();
    }
    public function status($id){
        $category = Category::findOrFail($id);
        if($category->status == 1){
            $category->status = 0;
            $category->save();
            Toastr::success('Category Disable Successfully','Success');
        }else{
            $category->status = 1;
            $category->save();
            Toastr::success('Category Active Successfully','Success');
        }
        return redirect()->back();
    }

}
