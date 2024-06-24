<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use Illuminate\Http\Request;

class CaseStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $case_studies = CaseStudy::paginate(15);
        return view('backend.case-studies.index', compact('case_studies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.case-studies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
            'brief_description' => 'nullable|string',
            'description' => 'required|string',
            'header_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $study = new CaseStudy;
        $study->title = $request->title;
        $study->meta_title = $request->meta_title;
        $study->meta_description = $request->meta_description;
        $study->brief_description = $request->brief_description;
        $study->description = $request->description;
        if ($request->hasFile('thumbnail_img')) {
            $fileName = time() . '-thumbnail-img-' . $request->file('thumbnail_img')->getClientOriginalName();
            $filePath = $request->file('thumbnail_img')->storeAs('uploads/pages', $fileName, 'public');
            $study->thumbnail_img = '/storage/' . $filePath;
        }
        $study->save();
        return back()->with('success', 'Study added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $study = CaseStudy::findOrFail(decrypt($id));
        return view('backend.case-studies.show', compact('study'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $study = CaseStudy::findOrFail(decrypt($id));
        return view('backend.case-studies.edit', compact('study'));
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
        ]);
        $study = CaseStudy::findOrFail(decrypt($id));
        $study->title = $request->title;
        $study->meta_title = $request->meta_title;
        $study->meta_description = $request->meta_description;
        $study->brief_description = $request->brief_description;
        $study->description = $request->description;
        if ($request->hasFile('thumbnail_img')) {
            $fileName = time() . '-thumbnail-img-' . $request->file('thumbnail_img')->getClientOriginalName();
            $filePath = $request->file('thumbnail_img')->storeAs('uploads/pages', $fileName, 'public');
            $study->thumbnail_img = '/storage/' . $filePath;
        }
        $study->update();
        return back()->with('success', 'Study added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        CaseStudy::findOrFail(decrypt($id))->delete();
        return back()->with('success', 'Study deleted successfully.');
    }
}