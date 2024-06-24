<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
            $profile->avatar = '/storage/' . $filePath;
        }
        if ($request->password) {
            $profile->password = Hash::make($request->password);
        }
        $profile->update();
        return back()->with('success', 'Profile updated Successfully.');
    }
}