<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\banner_title;
use App\Models\BannerSlider;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact_Message;
use App\Models\MyPortfolio;
use App\Models\Resume;
use App\Models\Review;
use App\Models\Service;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Artisan;

class FrontendController extends Controller
{
   
    public function index(){
        $data['categories'] = Category::latest()->get();
        $data['testimonials'] = Review::latest()->get();
        $data['portfolios'] = MyPortfolio::latest()->get();
        $data['blogs'] = Blog::latest()->get();
        $data['skills'] = Skill::latest()->get();
        $data['services'] = Service::latest()->get();
        $data['achievements'] = Achievement::latest()->get();
        $data['resumes_educations'] = Resume::where('type',1)->latest()->get();
        $data['resumes_experiences'] = Resume::where('type',2)->latest()->get();
        $data['sliders'] = BannerSlider::latest()->get();
        $data['titles'] = banner_title::latest()->get();
        return view('front.index')->with($data);
    }

    public function contact(Request $request){

        if ($this->contactValidate($request)) {
            Contact_Message::insert([
                'name' => $request->name,
                'email' => $request->email,
                'number' => $request->number,
                'subject' => $request->subject,
                'message' => $request->message,
                'created_at' => Carbon::now()
            ]);
            Toastr::success('Success', 'Message Sent Successfully');
            return back();
        }
        
      
    }
    public function clear(){
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('event:clear');
        Artisan::call('optimize:clear');
        return back();
        Toastr::success('Success', ' Cache clear Successfully');
    }
    public function contactValidate($request){
      return  $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'number' => ['required'],
            'subject' => ['required'],
            'message' => ['required'],
        ]);
    }
    
}
