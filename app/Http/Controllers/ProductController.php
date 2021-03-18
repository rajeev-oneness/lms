<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Auth;
use Session;

class ProductController extends Controller
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
        $products = Product::orderBy('created_at', 'desc')->paginate(5);
        return view('admin/pages/product/index', compact('products'));
    }
    public function add()
    {
        $categories = Category::all();
        return view('admin/pages/product/add', compact('categories'));
    }
    public function store(request $req)
    {
        if(Auth::check()) {
            $req->validate([
                'name' => 'required | min:20',
                'category_id' => 'required',
                'duration' => 'required',
                'no_of_lectures' => 'required',
                'number_of_views' => 'required',
                'validity_of_course' => 'required',
                'intro_video_link' => 'required | max:102400',
                'images' => 'required | max:4096',
                'description' => 'required | min:100',
                'mode' => 'required',
                'language' => 'required',
                'system_specification' => 'required | min:20',
                'price' => 'required',
                'offered_price' => 'required',
                'course_queries' => 'required | min:20',
                'study_materials' => 'required | max:4096',
                'technical_support' => 'required | regex:/^[a-zA-Z0-9\s]*$/'
                
            ],$messages = [
                'regex' => 'Use alphabates and numbers only',   
                'images.mimes' => 'Please insert image only',
                'images.max'   => 'Image should be less than 4 MB',
                'intro_video_link.mimes' => 'Please insert video only',
                'intro_video_link.max'   => 'Image should be less than 100 MB',
                'study_materials.mimes' => 'Please insert document and photos only',
                'study_materials.max'   => 'File should be less than 4 MB'
            ]);
            
            $product = new Product;
            $product->name = $req->input('name');
            $product->category_id = $req->input('category_id');
            $product->duration = $req->input('duration');
            $product->no_of_lectures = $req->input('no_of_lectures');
            $product->number_of_views = $req->input('number_of_views');
            $product->validity_of_course = $req->input('validity_of_course');
            if($req->hasFile('intro_video_link')) {
                $req->intro_video_link->store('product/intro', 'public');
                $product->intro_video_link = $req->intro_video_link->hashName();
            }
            if(count($req->images) > 0) { 
                foreach($req->images as $image) {
                    $name=$image->hashName();
                    $image->move(storage_path('app/public').'/product/img', $name);  
                    $product_images[] = $name;
                }
                $product->images = implode(',', $product_images);
            }
            $product->description = $req->input('description');
            $product->mode = $req->input('mode');
            $product->language = implode(',', $req->input('language'));
            $product->system_specification = $req->input('system_specification');
            $product->price = $req->input('price');
            $product->offered_price = $req->input('offered_price');
            $product->course_queries = $req->input('course_queries');
            if(count($req->study_materials) > 0) { 
                foreach($req->study_materials as $study_material) {
                    $name=$study_material->hashName();
                    $study_material->move(storage_path('app/public').'/product/study_materials', $name);  
                    $study_files[] = $name;
                }
                $product->study_materials = implode(',', $study_files);
            }
            $product->technical_support = $req->input('technical_support');

            $product->save();
            $req->session()->flash('productAdd', 'The product is added ssuccessfully!');
            return redirect()->route('product.list');
        }
    }
    public function edit($productId) {
        if(Auth::check()) {
            $product = product::find($productId);
            // echo $product->category_id;
            // dd($product);
            $categories = Category::all()->toArray();
            $category_data = Category::where('id', $product->category_id)->get();
            // dd($category_data);
            return view('admin/pages/product/edit', compact('product','category_data','categories'));
        }
    }
    public function update(request $req) {
        if(Auth::check()) {
            $req->validate([
                'name' => 'required | min:20',
                'category_id' => 'required',
                'duration' => 'required',
                'no_of_lectures' => 'required',
                'number_of_views' => 'required',
                'validity_of_course' => 'required',
                'intro_video_link' => 'required | max:102400',
                'images' => 'required | max:4096',
                'description' => 'required | min:100',
                'mode' => 'required',
                'language' => 'required',
                'system_specification' => 'required | min:20',
                'price' => 'required',
                'offered_price' => 'required',
                'course_queries' => 'required | min:20',
                'study_materials' => 'required | max:4096',
                'technical_support' => 'required | regex:/^[a-zA-Z0-9\s]*$/'
                
            ],$messages = [
                'regex' => 'Use alphabates and numbers only',   
                'images.mimes' => 'Please insert image only',
                'images.max'   => 'Image should be less than 4 MB',
                'intro_video_link.mimes' => 'Please insert video only',
                'intro_video_link.max'   => 'Image should be less than 100 MB',
                'study_materials.mimes' => 'Please insert document and photos only',
                'study_materials.max'   => 'File should be less than 4 MB'
            ]);
            
            $product = Product::find($req->input('productId'));
            $product->name = $req->input('name');
            $product->category_id = $req->input('category_id');
            $product->duration = $req->input('duration');
            $product->no_of_lectures = $req->input('no_of_lectures');
            $product->number_of_views = $req->input('number_of_views');
            $product->validity_of_course = $req->input('validity_of_course');
            if($req->hasFile('intro_video_link')) {
                $req->intro_video_link->store('product/intro', 'public');
                $product->intro_video_link = $req->intro_video_link->hashName();
            }
            if($req->hasFile('images')) {
                if(count($req->images) > 0) { 
                    foreach($req->images as $image) {
                        $name=$image->hashName();
                        $image->move(storage_path('app/public').'/product/img', $name);  
                        $product_images[] = $name;
                    }
                    $product->images = implode(',', $product_images);
                }
            }
            $product->description = $req->input('description');
            $product->mode = $req->input('mode');
            $product->language = implode(',', $req->input('language'));
            $product->system_specification = $req->input('system_specification');
            $product->price = $req->input('price');
            $product->offered_price = $req->input('offered_price');
            $product->course_queries = $req->input('course_queries');
            if($req->hasFile('study_materials')) {
                if(count($req->study_materials) > 0) { 
                    foreach($req->study_materials as $study_material) {
                        $name=$study_material->hashName();
                        $study_material->move(storage_path('app/public').'/product/study_materials', $name);  
                        $study_files[] = $name;
                    }
                    $product->study_materials = implode(',', $study_files);
                }
            }
            $product->technical_support = $req->input('technical_support');

            $product->save();
            $req->session()->flash('productEdit', 'The product is Edited ssuccessfully!');
            return redirect()->route('product.list');
        }
    }
    public function delete($productId) {
        if(Auth::check()) {
            Product::where('id', $productId)->delete();
            Session::flash('productDelete', 'The product is deleted ssuccessfully!');
            return redirect()->route('product.list');
        }
    }
}
