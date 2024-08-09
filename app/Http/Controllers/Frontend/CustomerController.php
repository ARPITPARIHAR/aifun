<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use Str;
class CustomerController extends Controller
{
    public function dashboard()
    {
        return view('frontend.dashboard');
    }
    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'nullable|string|confirmed|min:8',
        ]);
        $profile = User::findOrFail(auth()->user()->id);
        $profile->name = $request->name;
        $profile->email = $request->email;
        if ($request->hasFile('avatar')) {
            $fileName = time() . '-avatar-' . $request->file('avatar')->getClientOriginalName();
            $filePath = $request->file('avatar')->storeAs('uploads/profiles', $fileName, 'public');
            $profile->avatar = '/public/storage/' . $filePath;
        }
        if ($request->password) {
            $profile->password = Hash::make($request->password);
        }
        $profile->update();
        return back()->with('success', 'Profile updated Successfully.');
    }
    
    public function forgotPassword(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $email = NULL;
        $message = "Enter your email to recover your password:";
        if($user){
          $email = $user->email;
          if($user->temp_pass==NULL || $user->temp_pass_valid_till<date('Y-m-d H:i:s')){
            $user->temp_pass = Str::random(6);
            $user->temp_pass_valid_till = date('Y-m-d H:i:s', strtotime('+30 minutes'));  
          }
          $user->save();
          try {
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
          } catch (\Throwable $th) {
                //throw $th;
          }
          $message = "A temporary password has been sent to your registered email address. The temporary password is valid for 30 minutes. If you do not receive the email, please check your spam folder.";
        }
        return view('frontend.forgot-password',compact('email','message'));
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'temp_password' => 'required|string|min:6',
            'password' => 'required|string|confirmed|min:6',
        ]);
        
        $user = User::where('email',$request->email)->first();
        if($user && $user->temp_pass==$request->temp_password){
            if($user->temp_pass_valid_till<date('Y-m-d H:i:s')){
                $user->temp_pass = NULL;
                $user->temp_pass_valid_till = NULL;
                $user->update();
                return redirect()->route('forgot-password')->with('error',"Your temporary password has expired. Please request a new one.");
            } else{
                $user->password = Hash::make($request->password);
                $user->temp_pass = NULL;
                $user->temp_pass_valid_till = NULL;
                $user->update();
                return redirect()->route('login')->with('success','You have successfully reset your password. Please log in to your account.');
            }
            
        } else {
             return redirect()->route('forgot-password',['email'=>$request->email])->with('error'," Please enter a valid temporary password.");
        }
    }
}
