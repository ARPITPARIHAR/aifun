<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Face Swap</title>
    <!-- Include your CSS files here -->
</head>
<body>

    <div class="container">
        <!-- Display error message if it exists -->
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <h1>Face Swap</h1>

        <!-- Your form or content goes here -->
        <form action="{{ route('faceswap') }}" method="POST">
            @csrf
            <button type="submit">Swap Faces</button>
        </form>

        @if(isset($data))
            <!-- Display the response data from the API if available -->
            <div>
                <h2>Result:</h2>
                <pre>{{ json_encode($data, JSON_PRETTY_PRINT) }}</pre>
            </div>
        @endif
    </div>

    <!-- Include your JS files here -->
</body>
</html>
