<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FaceSwapController extends Controller
{
    public function show()
    {
        return view('frontend.faceswap');
    }

    public function faceSwap(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'swap_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'target_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Prepare the images for upload
        $swapImage = $request->file('swap_image');
        $targetImage = $request->file('target_image');

        // Send the face-swap request to the API

        $response = Http::withOptions(['verify' => false])->withHeaders([
            'Authorization' => '38aeacfa5f062c4dbeca98f7db2ceae0e5a08adc', // Replace with your actual API key
        ])->attach('swap_image', file_get_contents($swapImage->getRealPath()), $swapImage->getClientOriginalName())
          ->attach('target_image', file_get_contents($targetImage->getRealPath()), $targetImage->getClientOriginalName())
          ->timeout(60) // Set the timeout to 60 seconds
          ->post('https://api.artificialstudio.ai/api/generate', [
              'model' => 'face-swap',
              'webhook' => url('/api/webhook'), // Adjust if necessary
          ]);



       

        if ($response->successful()) {
            // Save the request ID or any other identifier for later checking
            $requestId = $response->json()['id']; // Assuming this is the ID you need
            session(['faceSwapRequestId' => $requestId]);

            return redirect()->route('faceswap')->with('success', 'Face-swap request submitted successfully. Please check back later for the result.');
        } else {
            return redirect()->route('faceswap')->with('error', 'Failed to submit face-swap request.');
        }
    }


    public function checkStatus()
{
    $requestId = session('faceSwapRequestId'); // Ensure this matches the session variable set in faceSwap

    if (!$requestId) {
        return redirect()->route('faceswap')->with('error', 'No request ID found. Please submit a face-swap request first.');
    }

    // Check the status of the face-swap request
    $response = Http::withOptions(['verify' => false])->withHeaders([
        'Authorization' => '38aeacfa5f062c4dbeca98f7db2ceae0e5a08adc', // Replace with your actual API key
    ])->get("https://api.artificialstudio.ai/api/status/{$requestId}");

    if ($response->successful()) {
        $status = $response->json();

        if ($status['status'] === 'completed') {
            // Get the URL of the swapped image from the response
            $resultImageUrl = $status['result_image_url'] ?? null; // Update according to API response structure
            session(['resultImage' => $resultImageUrl]);
            return redirect()->route('faceswap')->with('success', 'Face-swap completed successfully.');
        } elseif ($status['status'] === 'pending') {
            return redirect()->route('faceswap')->with('info', 'Face-swap is still pending, please check back later.');
        } else {
            return redirect()->route('faceswap')->with('error', 'Face-swap request failed.');
        }
    } else {
        return redirect()->route('faceswap')->with('error', 'Failed to check face-swap status.');
    }
}

}
