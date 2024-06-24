<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Law;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class LawController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laws = Law::paginate(15);
        return view('backend.laws.index', compact('laws'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.laws.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'brief_description' => 'required|string',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $law = new Law;
        $law->title = $request->title;
        $law->brief_description = $request->brief_description;
        if ($request->hasFile('icon')) {
            $fileName = time() . '-icon-' . $request->file('icon')->getClientOriginalName();
            $filePath = $request->file('icon')->storeAs('uploads/laws', $fileName, 'public');
            $law->icon = '/storage/' . $filePath;
        }
        $law->save();
        Artisan::call('cache:clear');
        return back()->with('success', 'Law added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $law = Law::findOrFail(decrypt($id));
        return view('backend.laws.show', compact('law'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $law = Law::findOrFail(decrypt($id));
        return view('backend.laws.edit', compact('law'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'brief_description' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $law = Law::findOrFail(decrypt($id));
        $law->title = $request->title;
        $law->brief_description = $request->brief_description;
        if ($request->hasFile('icon')) {
            $fileName = time() . '-icon-' . $request->file('icon')->getClientOriginalName();
            $filePath = $request->file('icon')->storeAs('uploads/laws', $fileName, 'public');
            $law->icon = '/storage/' . $filePath;
        }
        $law->update();
        Artisan::call('cache:clear');
        return back()->with('success', 'Law update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Law::findOrFail(decrypt($id))->delete();
        Artisan::call('cache:clear');
        return back()->with('success', 'Law deleted successfully.');
    }
}