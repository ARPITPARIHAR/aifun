@extends('frontend.layouts.app')

@section('content')
    <section class="face-swap">
        <h1>Face Swap Tool</h1>
        <iframe
            src="https://www.artificialstudio.ai/tools/face-swap"
            width="100%"
            height="600"
            frameborder="0"
            allowfullscreen>
        </iframe>
    </section>
@endsection

<style>
    .face-swap {
        text-align: center; /* Center the content */
        margin: 20px; /* Add some margin */
    }

    iframe {
        border: none; /* Remove the default border */
        width: 100%; /* Full width */
        height: 600px; /* Height of the iframe */
    }
</style>
