<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CustomerCase;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cases = CustomerCase::paginate(15);
        return view('backend.customer.cases.index', compact('cases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.customer.cases.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'customer' => 'required|numeric',
        ]);
        $case = new CustomerCase;
        $case->user_id = $request->customer;
        $case->title = $request->title;
        $case->description = $request->description;
        if ($case->save()) {
            return back()->with('success', 'Case added successfully.');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $case = CustomerCase::findOrFail(decrypt($id));
        return view('backend.customer.cases.show', compact('case'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $case = CustomerCase::findOrFail(decrypt($id));
        return view('backend.customer.cases.edit', compact('case'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'customer' => 'required|numeric',
        ]);
        $case = CustomerCase::findOrFail(decrypt($id));
        $case->user_id = $request->customer;
        $case->title = $request->title;
        $case->description = $request->description;
        if ($case->save()) {
            return back()->with('success', 'Case updated successfully.');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        CustomerCase::findOrFail(decrypt($id))->delete();
        return back()->with('success', 'Client deleted successfully.');
    }
}