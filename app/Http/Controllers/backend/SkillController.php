<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'percentage' => 'required'
        ]);
        $sill = new Skill;
        $sill->name = $request->name;
        $sill->percentage = $request->percentage;
        $sill->save();
        Toastr::success('Skill added Successfully','Success');
        return redirect()->back();
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'name' => 'required|string',
            'percentage' => 'required'
        ]);
        $sill = Skill::findOrFail($id);
        $sill->name = $request->name;
        $sill->percentage = $request->percentage;
        $sill->update();
        Toastr::success('Skill Updated Successfully','Success');
        return redirect()->back();
    }
    public function destroy($id){
        $skill = Skill::findOrFail($id);
        $skill->delete();
        Toastr::success('Skill Deleted Successfully','Success');
        return redirect()->back();
    }
}
