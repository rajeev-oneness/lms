<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
       $users = User::orderBy('created_at', 'desc')->paginate(5);
       return view('admin/pages/user/index', compact('users'));
   }
   public function add()
   {
       return view('admin/pages/user/add');
   }
   public function store(request $req)
   {
       if(Auth::check()) {
           $req->validate([
               'name' => 'required | regex:/^[a-zA-Z\s]*$/',
               'email' => 'required | email | unique:users',
               'phone' => 'required | max:10',
               'password' => 'required | min:8 | confirmed',
               'address' => 'required | regex:/^[a-zA-Z\s]*$/',
               'city' => 'required | regex:/^[a-zA-Z\s]*$/',
               'state' => 'required | regex:/^[a-zA-Z\s]*$/',
               'country' => 'required | regex:/^[a-zA-Z\s]*$/',
               'pin' => 'required | max:6 ',
           ],$messages = [
               'regex' => 'Use alphabates only',
           ]);
           $user = new User;
            $user->name = $req->input('name');
            $user->email = $req->input('email');
            $user->mobile = $req->input('phone');
            $user->password = Hash::make($req->input('password'));
            $user->address = $req->input('address');
            $user->city = $req->input('city');
            $user->state = $req->input('state');
            $user->country = $req->input('country');
            $user->pin = $req->input('pin');
            $user->save();
           $req->session()->flash('userAdd', 'The user is added ssuccessfully!');
           return redirect()->route('user.list');
       }
   }
   public function edit($userId) {
       if(Auth::check()) {
           $user = User::find($userId);
           return view('admin/pages/user/edit', compact('user'));
       }
   }
   public function update(request $req) {
       if(Auth::check()) {
        $req->validate([
            'name' => 'required | regex:/^[a-zA-Z\s]*$/',
            'email' => 'required | email | unique:users',
            'phone' => 'required | max:10',
            'address' => 'required | regex:/^[a-zA-Z\s]*$/',
            'city' => 'required | regex:/^[a-zA-Z\s]*$/',
            'state' => 'required | regex:/^[a-zA-Z\s]*$/',
            'country' => 'required | regex:/^[a-zA-Z\s]*$/',
            'pin' => 'required | max:6 ',
        ],$messages = [
            'regex' => 'Use alphabates only',
        ]);

            $user = User::find($req->input('userId'));   
            $user->name = $req->input('name');
            $user->email = $req->input('email');
            $user->mobile = $req->input('phone');
            $user->address = $req->input('address');
            $user->city = $req->input('city');
            $user->state = $req->input('state');
            $user->country = $req->input('country');
            $user->pin = $req->input('pin');
            $user->save();
            
            $req->session()->flash('userEdit', 'The user is edited ssuccessfully!');
            return redirect()->route('user.list');
       }
   }
   public function delete($userId) {
       if(Auth::check()) {
           User::where('id', $userId)->delete();
           Session::flash('userDelete', 'The user is deleted ssuccessfully!');
           return redirect()->route('user.list');
       }
   }
}

