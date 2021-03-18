<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use Auth;
use Session;

class FaqController extends Controller
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
       $faqs = Faq::orderBy('created_at', 'desc')->paginate(5);
       return view('admin/pages/faq/index', compact('faqs'));
   }
   public function add()
   {
       return view('admin/pages/faq/add');
   }
   public function store(request $req)
   {
       if(Auth::check()) {
            $req->validate([
                'title' => 'required | regex:/^[a-zA-Z0-9\s]*$/ | min:20 | max:250',
                'content' => 'required | min:100 | max:250',
            ],$messages = [
                'regex' => 'Use alphabates and numbers only'
            ]);
           $faq = new Faq;
           $faq->title = $req->input('title');
           $faq->content = $req->input('content');
           $faq->save();
           $req->session()->flash('faqAdd', 'The FAQ is added ssuccessfully!');
           return redirect()->route('faq.list');
       }
   }
   public function edit($faqId) {
       if(Auth::check()) {
           $faq = Faq::find($faqId);
           return view('admin/pages/faq/edit', compact('faq'));
       }
   }
   public function update(request $req) {
       if(Auth::check()) {
        $req->validate([
            'title' => 'required | regex:/^[a-zA-Z0-9\s]*$/ | min:20 | max:250',
            'content' => 'required | min:100 | max:250',
        ],$messages = [
            'regex' => 'Use alphabates and numbers only'
        ]);
           $faq = Faq::find($req->input('faqId'));
           $faq->title = $req->input('title');
           $faq->content = $req->input('content');
           $faq->save();
           $req->session()->flash('faqEdit', 'The FAQ is edited ssuccessfully!');
           return redirect()->route('faq.list');
       }
   }
   public function delete($faqId) {
       if(Auth::check()) {
           Faq::where('id', $faqId)->delete();
           Session::flash('faqDelete', 'The FAQ is deleted ssuccessfully!');
           return redirect()->route('faq.list');
       }
   }
}
