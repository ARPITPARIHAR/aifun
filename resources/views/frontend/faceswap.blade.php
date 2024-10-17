@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <h1>Face Swap Tool</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('info'))
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
    @endif

    <!-- Your form for uploading images -->
    <form action="{{ route('face-swap') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="swap_image">Swap Image:</label>
            <input type="file" name="swap_image" id="swap_image" required>
        </div>
        <div class="form-group">
            <label for="target_image">Target Image:</label>
            <input type="file" name="target_image" id="target_image" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @if (session('resultImage'))
        <h2>Swapped Image</h2>
        <img src="{{ session('resultImage') }}" alt="Swapped Image" class="img-fluid">
    @else
        <p>Please check back later for the swapped image.</p>
    @endif
</div>
@endsection
