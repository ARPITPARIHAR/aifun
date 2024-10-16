<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Page;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;


class PageController extends Controller
{
    protected $apiKey;
    protected $channelId;

    public function __construct()
    {
        $this->apiKey = env('YOUTUBE_API_KEY'); // Get the API key from environment variables
        $this->channelId = 'UCKyuHMy_8UNUAEkuV1s2zfw'; // Ensure this is the correct channel ID
    }

    public function home(Request $request)
    {
        // Fetch videos from YouTube channel
        $url = "https://www.googleapis.com/youtube/v3/search?key={$this->apiKey}&channelId={$this->channelId}&part=snippet&type=video&maxResults=10";

        // Ignore SSL certificate verification (only for development, not recommended for production)
        $response = Http::withOptions(['verify' => false])->get($url);

        $videos = [];

        if ($response->successful()) {
            $videos = $response->json()['items'];

            // Create an array to hold the video statistics
            $videoStatistics = [];

            // Fetch statistics for each video
            foreach ($videos as $video) {
                $videoId = $video['id']['videoId'];
                $statsResponse = Http::withOptions(['verify' => false])->get("https://www.googleapis.com/youtube/v3/videos", [
                    'part' => 'statistics',
                    'id' => $videoId,
                    'key' => $this->apiKey,
                ]);

                // Check if we have statistics in the response
                if ($statsResponse->successful() && $statsResponse->json()['items']) {
                    $statistics = $statsResponse->json()['items'][0]['statistics'];
                    $videoStatistics[$videoId] = $statistics;
                }
            }

            // Merge statistics with video data
            foreach ($videos as &$video) {
                $videoId = $video['id']['videoId'];
                $video['statistics'] = $videoStatistics[$videoId] ?? []; // Default to an empty array if no stats
            }
        } else {
            // Log the error details for debugging
            \Log::error('YouTube API Error: ' . $response->status() . ' - ' . $response->body());
        }

        return view('frontend.home', ['videos' => $videos]);
    }
    public function contact_us(Request $request)
    {
        return view('frontend.contact');
    }

    public function blog(Request $request)
    {
        return view('frontend.blog');
    }

    public function blogDetail(Request $request,$slug)
    {
        if( $blog = Blog::where('slug',$slug)->first()){
            return view('frontend.blog-detail',compact('blog'));
        }
        abort(404);

    }


    public function about_us(Request $request, $slug)
    {
        $page = Page::where('slug', $slug)->first();
        return view('frontend.page', compact('page'));
    }
    public function team(Request $request)
    {
        return view('frontend.team');
    }
     public function aboutTeam(Request $request,$slug)
    {

        if($team =Team::where('slug',$slug)->first()){
            return view('frontend.team-detail',compact('team'));
        }
         abort(404);

    }
    public function login_register(Request $request)
    {
        return view('frontend.login-register');
    }
    public function lawyers()
    {
        $page = Page::where('slug', 'lawyers')->first();
        return view('frontend.lawyers', compact('page'));
    }
    public function publications()
    {
        $page = Page::where('slug', 'publications')->first();
        return view('frontend.publications', compact('page'));
    }
    public function careers()
    {
        $page = Page::where('slug', 'careers')->first();
        return view('frontend.careers', compact('page'));
    }
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->first();
        return view('frontend.page', compact('page'));
    }


    public function disclaimer(){
        return view('frontend.disclaimer');
    }

    public function acceptDisclaimer(Request $request){
        // dd($request->all(),session('is_disclaimer'));
        if ($request->accept=='on') {
            $request->session()->put('is_disclaimer', true);
            return back()->with('success','Disclaimer accepted');
        } else{
            return back()->with('error','Please accept disclaimer');
        }
    }

}
