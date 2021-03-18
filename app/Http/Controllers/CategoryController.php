<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Session;

class CategoryController extends Controller
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
       $categories = Category::orderBy('created_at', 'desc')->paginate(5);
       return view('admin/pages/category/index', compact('categories'));
   }
   public function add()
   {
       return view('admin/pages/category/add');
   }
   public function store(request $req)
   {
       if(Auth::check()) {
        $req->validate([
            'name' => 'required | regex:/^[a-zA-Z\s]*$/',
            'categoryimage' => 'required | mimes:jpg,jpeg,png,bmp,tiff | max:4096',
            'shortdescription' => 'required | regex:/^[a-zA-Z\s]*$/'
        ],$messages = [   
            'regex' => 'Only accepts alphabates',
            'mimes' => 'Please insert image only',
            'max'   => 'Image should be less than 4 MB'
        ]);
           $category = new Category;
           $category->name = $req->input('name');
           $category->short_description = $req->input('shortdescription');
           if($req->hasFile('categoryimage')) {
               $ext = $req->categoryimage->getClientOriginalExtension();
               $time = time();
               $fileName = hash('ripemd128', $time).$ext;
               $category->image = $fileName;
               $req->categoryimage->storeAs('category/img', $fileName,'public');
           }
           $category->save();
           $req->session()->flash('categoryAdd', 'The category is added ssuccessfully!');
           return redirect()->route('category.list');
       }
   }
   public function edit($categoryId) {
       if(Auth::check()) {
           $category = Category::find($categoryId);
           return view('admin/pages/category/edit', compact('category'));
       }
   }
   public function update(request $req) {
       if(Auth::check()) {
        $req->validate([
            'name' => 'required | regex:/^[a-zA-Z\s]*$/',
            'categoryimage' => 'mimes:jpg,jpeg,png,bmp,tiff | max:4096',
            'shortdescription' => 'required | regex:/^[a-zA-Z\s]*$/'
        ],$messages = [   
            'regex' => 'Only accepts alphabates',
            'mimes' => 'Please insert image only',
            'max'   => 'Image should be less than 4 MB'
        ]);
           $category = Category::find($req->input('categoryId'));
           $category->name = $req->input('name');
           $category->short_description = $req->input('shortdescription');
           if($req->hasFile('categoryimage')) {
                $ext = $req->categoryimage->getClientOriginalExtension();
                $time = time();
                $fileName = hash('ripemd128', $time).$ext;
                $category->image = $fileName;
                $req->categoryimage->storeAs('category/img', $fileName,'public');
           }
           $category->save();
           $req->session()->flash('categoryEdit', 'The category is edited ssuccessfully!');
           return redirect()->route('category.list');
       }
   }
   public function delete($categoryId) {
       if(Auth::check()) {
            Category::where('id', $categoryId)->delete();
            Session::flash('categoryDelete', 'The category is deleted ssuccessfully!');
            return redirect()->route('category.list');
       }
   }
}
