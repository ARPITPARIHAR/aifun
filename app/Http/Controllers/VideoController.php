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
        $this->channelId = 'UCq-Fj5jknLsUfMG8n8jzZ4g'; // Your channel ID (AiFunFactory1221)
    }

    public function fetchVideos(Request $request)
    {
        // Fetch videos from YouTube channel
        $url = "https://www.googleapis.com/youtube/v3/search?key={$this->apiKey}&channelId={$this->channelId}&part=snippet&type=video&maxResults=10";

        $response = Http::get($url);

        if ($response->successful()) {
            $videos = $response->json()['items'];
            return view('videos.index', compact('videos')); // Use compact for cleaner code
        } else {
            // Log the error for further analysis
            \Log::error('YouTube API Error: ' . $response->status() . ' - ' . $response->body());
            return back()->with('error', 'Could not fetch videos. Please try again later.'); // User-friendly error message
        }
    }

    // Optional: Add a method for searching videos
    public function searchVideos(Request $request)
    {
        $query = $request->input('query');

        // Construct the search URL with the query parameter
        $url = "https://www.googleapis.com/youtube/v3/search?key={$this->apiKey}&channelId={$this->channelId}&part=snippet&type=video&maxResults=10&q=" . urlencode($query);

        $response = Http::get($url);

        if ($response->successful()) {
            $videos = $response->json()['items'];
            return view('videos.index', compact('videos'));
        } else {

