<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::orderBy('level')->orderBy('name')->paginate(15);
        return view('backend.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'page' => 'nullable|numeric',
            'name' => 'required|string',
            'title' => 'required|string',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
            'brief_description' => 'nullable|string',
            'description' => 'required|string',
            'header_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $page = new Page;
        if ($request->page) {
            $page->parent_id = $request->page;
            $parent_page = Page::findOrFail($request->page);
            $page->level = ($parent_page->level + 1);
        }
        $page->name = $request->name;
        $page->title = $request->title ?? $request->name;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->brief_description = $request->brief_description;
        $page->description = $request->description;
        if ($request->hasFile('header_img')) {
            $fileName = time() . '-header-img-' . $request->file('header_img')->getClientOriginalName();
            $filePath = $request->file('header_img')->storeAs('uploads/pages', $fileName, 'public');
            $page->header_img = '/storage/' . $filePath;
        }
        if ($request->hasFile('thumbnail_img')) {
            $fileName = time() . '-thumbnail-img-' . $request->file('thumbnail_img')->getClientOriginalName();
            $filePath = $request->file('thumbnail_img')->storeAs('uploads/pages', $fileName, 'public');
            $page->thumbnail_img = '/storage/' . $filePath;
        }
        $page->save();
        Artisan::call('cache:clear');
        return back()->with('success', 'Page added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $page = Page::find(decrypt($id));
        return view('backend.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $page = Page::find(decrypt($id));
        return view('backend.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'page' => 'nullable|numeric',
            'name' => 'required|string',
            'title' => 'required|string',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
            'brief_description' => 'nullable|string',
            'description' => 'required|string',
            'header_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $page = Page::findOrFail(decrypt($id));
        if ($request->page) {
            $page->parent_id = $request->page;
            $parent_page = Page::findOrFail($request->page);
            $page->level = ($parent_page->level + 1);
        } else {
            $page->parent_id = 0;
            $page->level = 0;
        }
        $page->name = $request->name;
        $page->title = $request->title ?? $request->name;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->brief_description = $request->brief_description;
        $page->description = $request->description;
        if ($request->hasFile('header_img')) {
            $fileName = time() . '-header-img-' . $request->file('header_img')->getClientOriginalName();
            $filePath = $request->file('header_img')->storeAs('uploads/pages', $fileName, 'public');
            $page->header_img = '/storage/' . $filePath;
        }
        if ($request->hasFile('thumbnail_img')) {
            $fileName = time() . '-thumbnail-img-' . $request->file('thumbnail_img')->getClientOriginalName();
            $filePath = $request->file('thumbnail_img')->storeAs('uploads/pages', $fileName, 'public');
            $page->thumbnail_img = '/storage/' . $filePath;
        }
        $page->update();
        Artisan::call('cache:clear');
        return back()->with('success', 'Page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Page::findOrFail(decrypt($id))->delete();
        Artisan::call('cache:clear');
        return back()->with('success', 'Page deleted successfully.');
    }
}