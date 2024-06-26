<?php
namespace App\Http\Controllers\Frontend;

use App\Models\Consulant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ConsultantQueryMail;
use Illuminate\Support\Facades\Mail;

class OnlineConsultantController extends Controller
{
    public function view(Request $request)
    {
        return view('frontend.onlineconsultancion');
    }

    public function store(Request $request)
    {
        $contact = new Consulant();

        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->number = $request->input('phone');
        $contact->address = $request->input('address');
        $contact->text = $request->input('query');

        $contact->save();

        $request->session()->flash('contact_form_data', $request->only(['name', 'phone', 'email', 'query']));

        // Send email
        Mail::to('ankurparihar111@gmail.com')->send(new ConsultantQueryMail($contact->toArray()));

        return redirect()->back()->with('success', 'Your Query Submitted');
    }
}


