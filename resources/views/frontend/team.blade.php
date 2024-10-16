@extends('frontend.layouts.app')

@section('content')
    <section class="face-swap">
        <h1>Face Swap Tool</h1>

        <!-- यहाँ आप API से प्राप्त डेटा का उपयोग करें -->
        @if(isset($data) && !empty($data))
            <div>
                <!-- Assuming $data contains images or any relevant information -->
                <img src="{{ $data['image_url'] }}" alt="Face Swap Result" width="100%">
                <p>{{ $data['description'] }}</p>
            </div>
        @else
            <p>No data available.</p>
        @endif
    </section>
@endsection

<style>
    .face-swap {
        text-align: center; /* Center the content */
        margin: 20px; /* Add some margin */
    }

    img {
        border: none; /* Remove the default border */
        width: 100%; /* Full width */
        height: auto; /* Height of the image */
    }
</style>
