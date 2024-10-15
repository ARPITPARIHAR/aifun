<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIFUN Factory - Video Platform</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .header {
            background-color: #003f62;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 2.5rem;
        }
        .search-bar {
            display: flex;
            justify-content: center;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .search-container {
            display: flex;
            align-items: center;
            width: 100%;
            max-width: 600px;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        .search-container input[type="text"] {
            flex: 1;
            padding: 12px 15px;
            border: none;
            font-size: 1rem;
            border-top-left-radius: 25px;
            border-bottom-left-radius: 25px;
            outline: none;
        }
        .search-container button {
            background-color: #003f62;
            color: white;
            border: none;
            padding: 12px 15px;
            border-top-right-radius: 25px;
            border-bottom-right-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .search-container button:hover {
            background-color: #004f82;
        }
        .main-video {
            margin: 20px 0;
            text-align: center;
        }
        .main-video iframe {
            width: 100%;
            height: 450px;
            max-width: 800px;
        }
        .video-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .video-item {
            flex: 1 1 calc(25% - 20px);
            max-width: calc(25% - 20px);
            background: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }
        .video-item img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .video-item h4 {
            font-size: 1.1rem;
            margin: 10px 0;
        }
        @media (max-width: 768px) {
            .video-item {
                flex: 1 1 calc(50% - 20px);
                max-width: calc(50% - 20px);
            }
        }
        @media (max-width: 576px) {
            .video-item {
                flex: 1 1 100%;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->


    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-container">
            <input type="text" id="search" placeholder="Search for videos...">
            <button type="button"><i class="fas fa-search"></i></button>
        </div>
    </div>

    <!-- Main Video Player -->
    <div class="main-video">
        <iframe id="mainVideo" src="https://www.youtube.com/embed/" frameborder="0" allowfullscreen></iframe>
    </div>

    <!-- Video Grid -->
    <div class="video-list">
        @foreach($videos as $video)
            <div class="video-item">
                <h3>{{ $video['snippet']['title'] }}</h3>
                <img src="{{ $video['snippet']['thumbnails']['high']['url'] }}" alt="Video Thumbnail">
                <p>{{ $video['snippet']['description'] }}</p>
            </div>
        @endforeach
    </div>
    <div class="container">
        <div class="video-grid" id="videoGrid">
            @foreach($videos as $video)
                <div class="video-item" onclick="playVideo('{{ $video['id']['videoId'] }}')">
                    <img src="{{ $video['snippet']['thumbnails']['high']['url'] }}" alt="Video Thumbnail">
                    <div class="video-info">
                        <h4 class="video-title">{{ $video['snippet']['title'] }}</h4>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        function playVideo(videoId) {
            document.getElementById('mainVideo').src = `https://www.youtube.com/embed/${videoId}`;
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
