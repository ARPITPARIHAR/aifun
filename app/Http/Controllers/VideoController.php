<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VideoController extends Controller
{
    protected $apiKey;      // Declare class property for API key
    protected $channelId;   // Declare class property for channel ID

    public function __construct()
    {
        $this->apiKey = env('YOUTUBE_API_KEY'); // Get the API key from environment variables
        $this->channelId = 'UC2vKJ1bY0KfU8sYY4h8W5sA'; // Your channel ID (AiFunFactory1221)
    }

    public function fetchVideos()
    {
        // Fetch videos from YouTube channel
        $url = "https://www.googleapis.com/youtube/v3/search?key={$this->apiKey}&channelId={$this->channelId}&part=snippet&type=video&maxResults=10";

        $response = Http::get($url);

        if ($response->successful()) {
            return view('videos.index', ['videos' => $response->json()['items']]);
        } else {
            return back()->with('error', 'Could not fetch videos. Please try again later.');
        }
    }
}
