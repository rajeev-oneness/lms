<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Auth;
use Session;

class CouponController extends Controller
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
       $coupons = Coupon::orderBy('created_at', 'desc')->paginate(5);
       return view('admin/pages/coupon/index', compact('coupons'));
   }
   public function add()
   {
       return view('admin/pages/coupon/add');
   }
   public function store(request $req)
   {
       if(Auth::check()) {
            $req->validate([
                'code' => 'required | regex:/^[a-zA-Z0-9]*$/',
                'type' => 'required | in:1,2',
                'rate' => 'required',
                'max_user' => 'required',
                'max_time_a_user_can_use' => 'required',
            ],$messages = [
                'regex' => 'Use alphabates and numbers only'
            ]);
           $coupon = new Coupon;
           $coupon->code = $req->input('code');
           $coupon->type = $req->input('type');
           $coupon->rate = $req->input('rate');
           $coupon->max_user = $req->input('max_user');
           $coupon->max_time_a_user_can_use = $req->input('max_time_a_user_can_use');
           $coupon->save();
           $req->session()->flash('couponAdd', 'The coupon is added ssuccessfully!');
           return redirect()->route('coupon.list');
       }
   }
   public function edit($couponId) {
       if(Auth::check()) {
           $coupon = Coupon::find($couponId);
           return view('admin/pages/coupon/edit', compact('coupon'));
       }
   }
   public function update(request $req) {
       if(Auth::check()) {
        $req->validate([
            'code' => 'required | regex:/^[a-zA-Z0-9]*$/',
            'type' => 'required | in:1,2',
            'rate' => 'required',
            'max_user' => 'required',
            'max_time_a_user_can_use' => 'required',
        ],$messages = [
            'regex' => 'Use alphabates and numbers only'
        ]);
           $coupon = Coupon::find($req->input('couponId'));
           $coupon->code = $req->input('code');
           $coupon->type = $req->input('type');
           $coupon->rate = $req->input('rate');
           $coupon->max_user = $req->input('max_user');
           $coupon->max_time_a_user_can_use = $req->input('max_time_a_user_can_use');
           $coupon->save();
           $req->session()->flash('couponEdit', 'The coupon is edited ssuccessfully!');
           return redirect()->route('coupon.list');
       }
   }
   public function delete($couponId) {
       if(Auth::check()) {
           Coupon::where('id', $couponId)->delete();
           Session::flash('couponDelete', 'The coupon is deleted ssuccessfully!');
           return redirect()->route('coupon.list');
       }
   }
}
