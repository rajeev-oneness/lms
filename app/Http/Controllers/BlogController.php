<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Auth;
use Session;

class BlogController extends Controller
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
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(5);
        return view('admin/pages/blog/index', compact('blogs'));
    }
    public function add()
    {
        return view('admin/pages/blog/add');
    }
    public function store(request $req)
    {
        if(Auth::check()) {
            $req->validate([
                'title' => 'required | regex:/^[a-zA-Z0-9\s]*$/ | min:20',
                'content' => 'required | min:100',
                'blogimage' => 'required | mimes:jpg,jpeg,png,bmp,tiff | max:4096',
            ],$messages = [
                'regex' => 'Use alphabates and numbers only',   
                'mimes' => 'Please insert image only',
                'max'   => 'Image should be less than 4 MB'
            ]);
            $blog = new Blog;
            $blog->author = Auth::user()->id;
            $blog->title = $req->input('title');
            $blog->content = $req->input('content');
            if($req->hasFile('blogimage')) {
                $req->blogimage->store('blog/img', 'public');
                $blog->image = $req->blogimage->hashName();
            } else {
                $blog->image = NULL;
            }
            $blog->save();
            $req->session()->flash('blogAdd', 'The blog is added ssuccessfully!');
            return redirect()->route('blog.list');
        }
    }
    public function edit($blogId) {
        if(Auth::check()) {
            $blog = Blog::find($blogId);
            return view('admin/pages/blog/edit', compact('blog'));
        }
    }
    public function update(request $req) {
        if(Auth::check()) {
            $req->validate([
                'title' => 'required | regex:/^[a-zA-Z0-9\s]*$/ | min:20',
                'content' => 'required | min:100',
                'blogimage' => 'mimes:jpg,jpeg,png,bmp,tiff | max:4096',
            ],$messages = [
                'regex' => 'Use alphabates and numbers only',   
                'mimes' => 'Please insert image only',
                'max'   => 'Image should be less than 4 MB'
            ]);
            $blog = Blog::find($req->input('blogId'));
            $blog->title = $req->input('title');
            $blog->content = $req->input('content');
            if($req->hasFile('blogimage')) {
                $req->blogimage->store('blog/img', 'public');
                $blog->image = $req->blogimage->hashName();
            }
            $blog->save();
            $req->session()->flash('blogEdit', 'The blog is edited ssuccessfully!');
            return redirect()->route('blog.list');
        }
    }
    public function delete($blogId) {
        if(Auth::check()) {
            Blog::where('id', $blogId)->delete();
            Session::flash('blogDelete', 'The blog is deleted ssuccessfully!');
            return redirect()->route('blog.list');
        }
    }
}
