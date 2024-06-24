<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::orderBy('name')->paginate(15);
        return view('backend.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'url' => 'nullable|url',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $client = new Client;
        $client->name = $request->name;
        $client->url = $request->url ?? '#';
        if ($request->hasFile('logo')) {
            $fileName = time() . '-logo-' . $request->file('logo')->getClientOriginalName();
            $filePath = $request->file('logo')->storeAs('uploads/clients', $fileName, 'public');
            $client->logo = '/storage/' . $filePath;
        }
        $client->save();
        Artisan::call('cache:clear');
        return back()->with('success', 'Client  added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $client = Client::findOrFail(decrypt($id));
        return view('backend.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::findOrFail(decrypt($id));
        return view('backend.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'url' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $client = Client::findOrFail(decrypt($id));
        $client->name = $request->name;
        $client->url = $request->url ?? '#';
        if ($request->hasFile('logo')) {
            $fileName = time() . '-logo-' . $request->file('logo')->getClientOriginalName();
            $filePath = $request->file('logo')->storeAs('uploads/clients', $fileName, 'public');
            $client->logo = '/storage/' . $filePath;
        }
        $client->save();
        Artisan::call('cache:clear');
        return back()->with('success', 'Client  update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Client::findOrFail(decrypt($id))->delete();
        Artisan::call('cache:clear');
        return back()->with('success', 'Client deleted successfully.');
    }
}