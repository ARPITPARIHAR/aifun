<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Consulant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OnlineConsultantController extends Controller
{
    public function view(Request $request)
    {
        return view('frontend.onlineconsultancion');
    }

    public function store(Request $request)
    {
        // Create a new Consulant instance
        $contact = new Consulant();

        // Assign values directly from request inputs (assuming form fields are named correctly)
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->number = $request->input('phone');
        $contact->address = $request->input('address');
        $contact->text = $request->input('query');

        // Save the contact into the database
        $contact->save();

        // Optionally, you can process further logic here, like sending an email

        // Store the form data in a session for display in the view
        $request->session()->flash('contact_form_data', $request->only(['name', 'phone', 'email', 'query']));

        // Redirect back to the form with a success message
        return redirect()->back()->with('success', 'Your Query Submitted');
    }
}


