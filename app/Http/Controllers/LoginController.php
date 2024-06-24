<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;
class LoginController extends Controller
{
    public function customer_login() {

        return view('frontend.login-register');
    }
    public function backend_login() {
        return view('backend.login');
    }
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'phone' => 'required|digits:10',
            'address' => 'required|string',
            'password' => 'required|min:6'
        ]);
        $user = new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->address=$request->address;
        $user->password=Hash::make($request->password);
        if ($user->save()) {
            return back()->with('success','You are successfully register. login your account');
        } else{
            return back()->with('error','Something went wrong');
        }
    }
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $email =$request->email;
        $password =$request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
           if (auth()->user()->user_type=='customer') {
            return redirect()->route('customer.dashboard');
           }elseif (auth()->user()->user_type=='admin') {
             return redirect()->route('admin.dashboard');
           }else{
            return back()->with('error',"your login credentials don't match an account in our system");
           }

        }else{
            return back()->with('error',"your login credentials don't match an account in our system");
        }
    }
    public function logout(){
        $user_type =auth()->user()->user_type;
        Auth::logout();
        if ( $user_type=='customer') {
           return redirect()->route('login');
        }
        if ( $user_type='admin') {
            return redirect()->route('backend.login');

        }
    }
}
