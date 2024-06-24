<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $billings = Billing::paginate(15);
        return view('backend.customer.billings.index', compact('billings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.customer.billings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer' => 'required|numeric',
            'amount' => 'required',
            'description' => 'nullable|string',
            'payment_date' => 'required|date',
            'payment_mode' => 'required|in:cash,online,cheque,other',
        ]);
        $bill = new Billing;
        $bill->user_id = $request->customer;
        $bill->amount = $request->amount;
        $bill->description = $request->description;
        $bill->payment_date = $request->payment_date;
        $bill->payment_mode = $request->payment_mode;
        if ($bill->save()) {
            return back()->with('success', 'Billing added successfully.');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $billing = Billing::findOrFail($id);
        return view('backend.customer.billings.show', compact('billing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $billing = Billing::findOrFail(decrypt($id));
        return view('backend.customer.billings.edit', compact('billing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'customer' => 'required|numeric',
            'amount' => 'required',
            'description' => 'nullable|string',
            'payment_date' => 'required|date',
            'payment_mode' => 'required|in:cash,online,cheque,other',
        ]);
        $bill = Billing::findOrFail(decrypt($id));
        $bill->user_id = $request->customer;
        $bill->amount = $request->amount;
        $bill->description = $request->description;
        $bill->payment_date = $request->payment_date;
        $bill->payment_mode = $request->payment_mode;
        if ($bill->update()) {
            return back()->with('success', 'Billing updated successfully.');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Billing::findOrFail(decrypt($id))->delete();
        return back()->with('success', 'Billing deleted successfully.');
    }
}