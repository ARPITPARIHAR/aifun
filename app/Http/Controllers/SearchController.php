<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CaseStudy;
use App\Models\PracticeArea;
use App\Models\Client;
use App\Models\Blog;
use App\Models\Law;
class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = [];

        $results['blogs'] = Blog::where('title', 'LIKE', "%{$query}%")
                                 ->orWhere('brief_description', 'LIKE', "%{$query}%")
                                 ->get();

        $results['case_studies'] = CaseStudy::where('title', 'LIKE', "%{$query}%")
                                             ->orWhere('brief_description', 'LIKE', "%{$query}%")
                                             ->orWhere('description', 'LIKE', "%{$query}%")
                                             ->get();

        $results['practice_areas'] = PracticeArea::where('title', 'LIKE', "%{$query}%")
                                                 ->orWhere('brief_description', 'LIKE', "%{$query}%")
                                                 ->orWhere('description', 'LIKE', "%{$query}%")
                                                 ->get();

        $results['clients'] = Client::where('name', 'LIKE', "%{$query}%") ->get();


        $results['laws'] = Law::where('title', 'LIKE', "%{$query}%")
        ->orWhere('brief_description', 'LIKE', "%{$query}%")
        ->get();

        return view('search_results', compact('results', 'query'));
    }
}
