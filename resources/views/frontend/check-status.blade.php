@extends('layouts.app') <!-- Extend your main layout -->

@section('content')
<div class="container">
    <h1>Face Swap Status</h1>

    @if (session('resultImage'))
        <div class="alert alert-success">
            <p>Face-swap completed successfully!</p>
            <img src="{{ session('resultImage') }}" alt="Swapped Image" style="max-width: 100%; height: auto;">
        </div>
    @else
        <div class="alert alert-warning">
            <p>No result available. Please check back later.</p>
        </div>
    @endif

    <a href="{{ route('faceswap') }}" class="btn btn-primary">Back to Face Swap</a>
</div>
@endsection
