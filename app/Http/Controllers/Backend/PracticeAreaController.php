<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PracticeArea;
use Illuminate\Support\Facades\Artisan;

class PracticeAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $practice_areas = PracticeArea::orderBy('title')->paginate(15);
        return view('backend.practice-areas.index', compact('practice_areas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.practice-areas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:practice_areas,title',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
            'brief_description' => 'nullable|string',
            'description' => 'required|string',
            'header_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $practice_area = new PracticeArea;
        $practice_area->title = $request->title;
        $practice_area->meta_title = $request->meta_title;
        $practice_area->meta_description = $request->meta_description;
        $practice_area->brief_description = $request->brief_description;
        $practice_area->description = $request->description;


        if ($request->hasFile('header_img')) {
            $fileName = time() . '-header-img-' . $request->file('header_img')->getClientOriginalName();
            $filePath = $request->file('header_img')->storeAs('uploads/practice-areas', $fileName, 'public');
            $practice_area->header_img = '/storage/' . $filePath;
        }
        if ($request->hasFile('thumbnail_img')) {
            $fileName = time() . '-thumbnail-img-' . $request->file('thumbnail_img')->getClientOriginalName();
            $filePath = $request->file('thumbnail_img')->storeAs('uploads/practice-areas', $fileName, 'public');
            $practice_area->thumbnail_img = '/storage/' . $filePath;
        }

        if ($request->hasFile('icon')) {

            $fileName = time() . '-icon-' . $request->file('icon')->getClientOriginalName();
            $filePath = $request->file('icon')->storeAs('uploads/practice-areas', $fileName, 'public');
            $practice_area->icon = '/storage/' . $filePath;
        }
        $practice_area->save();
        Artisan::call('cache:clear');
        return back()->with('success', 'Practice area added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $practice_area = PracticeArea::findOrFail(decrypt($id));
        return view('backend.practice-areas.show', compact('practice_area'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $practice_area = PracticeArea::findOrFail(decrypt($id));
        return view('backend.practice-areas.edit', compact('practice_area'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
            'brief_description' => 'nullable|string',
            'description' => 'required|string',
            'header_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $practice_area = PracticeArea::findOrFail(decrypt($id));
        $practice_area->title = $request->title;
        $practice_area->meta_title = $request->meta_title;
        $practice_area->meta_description = $request->meta_description;
        $practice_area->brief_description = $request->brief_description;
        $practice_area->description = $request->description;
        if ($request->hasFile('header_img')) {
            $fileName = time() . '-header-img-' . $request->file('header_img')->getClientOriginalName();
            $filePath = $request->file('header_img')->storeAs('uploads/practice-areas', $fileName, 'public');
            $practice_area->header_img = '/storage/' . $filePath;
        }
        if ($request->hasFile('thumbnail_img')) {
            $fileName = time() . '-thumbnail-img-' . $request->file('thumbnail_img')->getClientOriginalName();
            $filePath = $request->file('thumbnail_img')->storeAs('uploads/practice-areas', $fileName, 'public');
            $practice_area->thumbnail_img = '/storage/' . $filePath;
        }

        if ($request->hasFile('icon')) {

            $fileName = time() . '-icon-' . $request->file('icon')->getClientOriginalName();
            $filePath = $request->file('icon')->storeAs('uploads/practice-areas', $fileName, 'public');
            $practice_area->icon = '/storage/' . $filePath;
        }
        $practice_area->save();
        Artisan::call('cache:clear');
        return back()->with('success', 'Pratice area updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        PracticeArea::findOrFail(decrypt($id))->delete();
        Artisan::call('cache:clear');
        return back()->with('success', 'Practice area deleted successfully.');
    }
}