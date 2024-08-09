<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $blogs = Blog::paginate(15);
        return view('backend.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'brief_description' => 'nullable|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->brief_description = $request->brief_description;
        $blog->description = $request->description;
        if ($request->hasFile('image')) {
            $fileName = time() . '-slider-' . $request->file('image')->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads/blogs', $fileName, 'public');
            $blog->image = '/public/storege/' . $filePath;
        }
        $blog->save();
        Artisan::call('cache:clear');
        return back()->with('success', 'Blog added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('backend.blogs.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail(decrypt($id));
        return view('backend.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       
        $request->validate([

            'title' => 'required|string',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'brief_description' => 'nullable|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $blog = Blog::findOrFail(decrypt($id));

        $blog->title = $request->title;
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->brief_description = $request->brief_description;
        $blog->description = $request->description;
        if ($request->hasFile('image')) {
            $fileName = time() . '-slider-' . $request->file('image')->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads/blogs', $fileName, 'public');
            $blog->image = '/public/storage/' . $filePath;
        }
        $blog->update();
        Artisan::call('cache:clear');
        return back()->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Blog::findOrFail(decrypt($id))->delete();
        Artisan::call('cache:clear');
        return back()->with('success', 'Page deleted successfully.');
    }
}
