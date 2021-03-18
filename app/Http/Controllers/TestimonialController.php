<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Auth;
use Session;

class TestimonialController extends Controller
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
       $testimonials = Testimonial::orderBy('created_at', 'desc')->paginate(5);
       return view('admin/pages/testimonial/index', compact('testimonials'));
   }
   public function add()
   {
       return view('admin/pages/testimonial/add');
   }
   public function store(request $req)
   {
       if(Auth::check()) {
        $req->validate([
            'name' => 'required | max:250',
            'title' => 'required | max:250',
            'content' => 'required',
            'testimonialimage' => 'required | mimes:jpg,jpeg,png,bmp,tiff | max:4096',
        ],$messages = [ 
            'mimes' => 'Please insert image only',
            'max'   => 'Image should be less than 4 MB'
        ]);
           $testimonial = new Testimonial;
           $testimonial->name = $req->input('name');
           $testimonial->title = $req->input('title');
           $testimonial->content = $req->input('content');
           if($req->hasFile('testimonialimage')) {
                $ext = $req->testimonialimage->getClientOriginalExtension();
                $time = time();
                $fileName = hash('ripemd128', $time).$ext;
                $testimonial->image = $fileName;
                $req->testimonialimage->storeAs('testimonial/img', $fileName,'public');
           }
           $testimonial->save();
           $req->session()->flash('testiAdd', 'The Testimonial is added ssuccessfully!');
           return redirect()->route('testimonial.list');
       }
   }
   public function edit($testimonialId) {
       if(Auth::check()) {
           $testimonial = Testimonial::find($testimonialId);
           return view('admin/pages/testimonial/edit', compact('testimonial'));
       }
   }
   public function update(request $req) {
       if(Auth::check()) {
        $req->validate([
            'name' => 'required | max:250',
            'title' => 'required | max:250',
            'content' => 'required',
            'testimonialimage' => 'mimes:jpg,jpeg,png,bmp,tiff | max:4096',
        ],$messages = [ 
            'mimes' => 'Please insert image only',
            'max'   => 'Image should be less than 4 MB'
        ]);
           $testimonial = Testimonial::find($req->input('testimonialId'));
           $testimonial->name = $req->input('name');
           $testimonial->title = $req->input('title');
           $testimonial->content = $req->input('content');
           if($req->hasFile('testimonialimage')) {
                $ext = $req->testimonialimage->getClientOriginalExtension();
                $time = time();
                $fileName = hash('ripemd128', $time).$ext;
                $testimonial->image = $fileName;
                $req->testimonialimage->storeAs('testimonial/img', $fileName,'public');
           }
           $testimonial->save();
           $req->session()->flash('testiEdit', 'The testimonial is edited ssuccessfully!');
           return redirect()->route('testimonial.list');
       }
   }
   public function delete($testimonialId) {
       if(Auth::check()) {
           Testimonial::where('id', $testimonialId)->delete();
           Session::flash('testiDelete', 'The testimonial is deleted ssuccessfully!');
           return redirect()->route('testimonial.list');
       }
   }
}