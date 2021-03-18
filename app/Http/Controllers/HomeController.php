<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Testimonial;
use App\Models\Banner;
use App\Models\User;
use App\Models\Product;
use App\Models\Coupon;

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
        $blogs = Blog::all()->count();
        $faqs = Faq::all()->count();
        $testimonials = testimonial::all()->count();
        $banners = Banner::all()->count();
        $users = User::all()->count();
        $products = Product::all()->count();
        $coupons = Coupon::all()->count();
        return view('admin/pages/homepage', compact('blogs','faqs','testimonials','banners','users','products','coupons'));
    }
}
