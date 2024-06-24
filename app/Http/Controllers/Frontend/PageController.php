<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function home(Request $request)
    {
        return view('frontend.home');
    }
    public function contact_us(Request $request)
    {
        return view('frontend.contact');
    }
    public function about_us(Request $request, $slug)
    {
        $page = Page::where('slug', $slug)->first();
        return view('frontend.page', compact('page'));
    }
    public function team(Request $request)
    {
        return view('frontend.team');
    }
    public function login_register(Request $request)
    {
        return view('frontend.login-register');
    }
    public function lawyers()
    {
        $page = Page::where('slug', 'lawyers')->first();
        return view('frontend.lawyers', compact('page'));
    }
    public function publications()
    {
        $page = Page::where('slug', 'publications')->first();
        return view('frontend.publications', compact('page'));
    }
    public function careers()
    {
        $page = Page::where('slug', 'careers')->first();
        return view('frontend.careers', compact('page'));
    }
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->first();
        return view('frontend.page', compact('page'));
    }
}