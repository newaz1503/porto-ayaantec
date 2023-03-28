<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\ResumeRequest;
class ResumeController extends Controller
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
        $data['resumes'] = Resume::latest()->get();
        return view('backend.resume.index')->with($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Request
     */
    public function store(ResumeRequest $request)
    {
        Resume::insert($request->except('_token'));
        Toastr::success('Success', 'Resume Added Successfully!!');
        return back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResumeRequest $request, Resume $resume)
    {
        $resume->start_date = $request->start_date;
        $resume->end_date = $request->end_date;
        $resume->orgamization = $request->orgamization;
        $resume->experience = $request->experience;
        $resume->type = $request->type;
        $resume->save();
        Toastr::success('Success', 'Resume Updated Successfully!!');
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
        Resume::find($id)->delete();
        Toastr::error('Success', 'Resume Deleted Successfully!!');
        return back();
    }
}
