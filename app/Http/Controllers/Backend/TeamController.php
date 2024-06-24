<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::paginate(15);
        return view('backend.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'designation' => 'required|string',
            'brief_description' => 'required|string',
            'thumbnail_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $team = new Team;
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->brief_description = $request->brief_description;
        if ($request->hasFile('thumbnail_img')) {
            $fileName = time() . '-team-' . $request->file('thumbnail_img')->getClientOriginalName();
            $filePath = $request->file('thumbnail_img')->storeAs('uploads/teams', $fileName, 'public');
            $team->header_img = '/storage/' . $filePath;
        }
        $team->save();
        Artisan::call('cache:clear');
        return back()->with('success', 'Team member added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('backend.teams.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $team = Team::findOrFail(decrypt($id));
        return view('backend.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'designation' => 'required|string',
            'brief_description' => 'required|string',
            'thumbnail_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $team = Team::findOrFail(decrypt($id));
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->brief_description = $request->brief_description;
        if ($request->hasFile('thumbnail_img')) {
            $fileName = time() . '-team-' . $request->file('thumbnail_img')->getClientOriginalName();
            $filePath = $request->file('thumbnail_img')->storeAs('uploads/teams', $fileName, 'public');
            $team->thumbnail_img = '/storage/' . $filePath;
        }
        $team->update();
        Artisan::call('cache:clear');
        return back()->with('success', 'Team member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Team::findOrFail(decrypt($id))->delete();
        Artisan::call('cache:clear');
        return back()->with('success', 'Team member deleted successfully.');
    }
}