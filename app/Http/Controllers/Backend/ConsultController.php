<?php
namespace App\Http\Controllers\Backend;


use App\Models\Consulant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsultController extends Controller
{

    public function index()
    {
        $consults = Consulant::paginate(10); // Fetching contacts with pagination

        return view('backend.consult.index', compact('consults'));
    }


    public function delete(Request $request, $id)
    {
        // Decrypt the ID and find the consultant
        $consultant = Consulant::find(decrypt($id));

        // Check if the consultant exists
        if (!$consultant) {
            return redirect()->route('admin.consult.index')->with('error', 'Consultant not found.');
        }

        // Delete the consultant
        $consultant->delete();

        // Redirect with success message
        return redirect()->route('admin.consult.index')->with('success', 'Consultant deleted successfully.');
    }


}
