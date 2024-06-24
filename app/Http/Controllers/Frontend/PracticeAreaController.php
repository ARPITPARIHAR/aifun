<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PracticeArea;

class PracticeAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $practice_areas = PracticeArea::orderBy('title')->get();
        return view('frontend.practice-areas', compact('practice_areas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $slug)
    {
        $practice_area = PracticeArea::where('slug', $slug)->first();
        if ($practice_area) {
            return view('frontend.practice-area', compact('practice_area'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
