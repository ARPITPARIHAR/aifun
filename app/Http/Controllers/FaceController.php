<!-- <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Http;

// class FaceController extends Controller
// {
//     public function index(Request $request)
//     {
//         // If the form is submitted
//         if ($request->isMethod('post')) {
//             $apiUrl = 'https://api.artificialstudio.ai/api/generate'; // Your API endpoint
//             $apiKey = '38aeacfa5f062c4dbeca98f7db2ceae0e5a08adc'; // Your API key

//             // Define the images you want to swap
//             $swapImage = "https://replicate.delivery/pbxt/JN97ny6RmjfrxizbgyHnPGGP8Kxzw6UI20ekarOg7dbo02Pi/elon.jpg";
//             $targetImage = "https://assets.artificialstudio.ai/models/face-swap-preview.jpg";

//             try {
//                 // Make the API call
//                 $response = Http::withOptions(['verify' => false])->post($apiUrl, [
//                     'model' => 'face-swap',
//                     'input' => [
//                         'swap_image' => $swapImage,
//                         'target_image' => $targetImage,
//                     ],
//                     'webhook' => url('/api/webhook'), // Use Laravel's URL helper for the webhook
//                 ], [
//                     'headers' => [
//                         'Authorization' => $apiKey,
//                         'Content-Type' => 'application/json',
//                     ],
//                 ]);

//                 // Log the response for debugging
//                 \Log::info('API Response', [
//                     'status' => $response->status(),
//                     'response' => $response->body(),
//                 ]);

//                 // Check if the response was successful
//                 if ($response->successful()) {
//                     $data = $response->json();
//                     return view('frontend.faceswap', compact('data')); // Return the view with data
//                 } else {
//                     \Log::error('API Error', [
//                         'status' => $response->status(),
//                         'response' => $response->body(),
//                     ]);
//                     return back()->with('error', 'Could not create face swap. Please try again later.');
//                 }
//             } catch (\Exception $e) {
//                 // Log any exceptions that occur
//                 \Log::error('Exception', ['message' => $e->getMessage()]);
//                 return back()->with('error', 'An error occurred. Please try again later.');
//             }
//         }

//         // Render the initial page when accessed via GET
//         return view('frontend.faceswap'); // Return the form view for GET request
//     }
// }
