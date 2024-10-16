<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIFUN Factory - Video Platform</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
      /* General Styles */

    </style>
</head>
<body>




    <div class="search-bar">
        <div class="search-container">
            <input type="text" id="search" placeholder="Search for videos..." onkeyup="searchVideos()">
            <button type="button" onclick="searchVideos()"><i class="fas fa-search"></i></button>
        </div>
    </div>
    <!-- Main Video Player -->
    <div class="main-video">
        <iframe id="mainVideo" src="https://www.youtube.com/embed/" frameborder="0" allowfullscreen></iframe>
    </div>

    <!-- Video Grid -->
    {{-- <div class="video-list">
        @foreach($videos as $video)
            <div class="video-item">
                <h3>{{ $video['snippet']['title'] }}</h3>
                <img src="{{ $video['snippet']['thumbnails']['high']['url'] }}" alt="Video Thumbnail">
                <p>{{ $video['snippet']['description'] }}</p>
            </div>
        @endforeach
    </div> --}}
    <div class="container">
        <div class="video-grid" id="videoGrid">
            @foreach($videos as $video)
                <div class="video-item" onclick="playVideo('{{ $video['id']['videoId'] }}')">
                    <img class="video-thumbnail" src="{{ $video['snippet']['thumbnails']['high']['url'] }}" alt="Video Thumbnail">
                    <div class="video-info">
                        <h4 class="video-title">{{ $video['snippet']['title'] }}</h4>
                        <div class="video-details">
                            <span class="channel-name">{{ $video['snippet']['channelTitle'] }}</span>
                            <span class="video-time">{{ \Carbon\Carbon::parse($video['snippet']['publishedAt'])->diffForHumans() }}</span>
                            <span class="video-views">{{ number_format($video['statistics']['viewCount']) }} views</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



    <style>
      /* General Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
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
/* Container for the grid */.main-video {
            margin: 20px 0;
            text-align: center;
        }
        .main-video iframe {
            width: 100%;
            height: 450px;
            max-width: 800px;
        }
.container {
    max-width: 100%; /* Full width */
    margin: 0 auto; /* Center the container */
    padding: 20px; /* Padding around the container */
}

/* Grid styles */
.video-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* Adjusted to minimum width */
    gap: 15px; /* Space between grid items */
}

/* Individual video item styles */
.video-item {
    background-color: #fff; /* White background for items */
    border: 1px solid #ddd; /* Light border around video items */
    border-radius: 8px; /* Rounded corners */
    overflow: hidden; /* Ensure content doesn't overflow */
    cursor: pointer; /* Change cursor on hover */
    transition: transform 0.2s; /* Smooth scaling effect */
    display: flex;
    flex-direction: column; /* Stack thumbnail and info vertically */
}

.video-item:hover {
    transform: scale(1.02); /* Slightly enlarge the item on hover */
}

/* Video thumbnail */
.video-thumbnail {
    width: 100%; /* Make thumbnail responsive */
    height: auto; /* Maintain aspect ratio */
}

/* Video info styles */
.video-info {
    padding: 10px; /* Padding inside the video item */
    flex-grow: 1; /* Allow this to grow */
}

.video-title {
    font-size: 1.1em; /* Slightly larger title font */
    margin: 0; /* Remove default margin */
    color: #333; /* Dark color for title */
}

.video-details {
    display: flex; /* Flexbox for details */
    justify-content: space-between; /* Space between details */
    font-size: 0.9em; /* Smaller font for details */
    color: #666; /* Lighter color for details */
}

/* Individual detail styles */
.channel-name, .video-time, .video-views {
    margin: 0; /* Remove default margin */
}

/* Media Queries for Responsive Adjustments */
@media (min-width: 600px) {
    .video-grid {
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); /* Wider items on larger screens */
    }
}

@media (min-width: 900px) {
    .video-grid {
        grid-template-columns: repeat(auto-fill, minmax(400px, 1fr)); /* Even wider items on larger screens */
    }
}

    </style>

    <script>
        function playVideo(videoId) {
            // Logic to play the video (e.g., open in modal, redirect, etc.)
            console.log("Playing video with ID:", videoId);
            // You can implement the video playing logic here
        }
    </script>

    </div>
    <script>
     function searchVideos() {
    const query = document.getElementById('search').value.trim();
    const apiKey = '{{ env('YOUTUBE_API_KEY') }}'; // Ensure you have the API key in your Blade file
    const channelId = 'UCzKdlgjlMgQustU3-7WsIzQ'; // Your channel ID
    const url = `https://www.googleapis.com/youtube/v3/search?key=${apiKey}&channelId=${channelId}&part=snippet&type=video&maxResults=10&q=${encodeURIComponent(query)}`;

    // Fetch videos from YouTube API
    fetch(url)
        .then(response => response.json())
        .then(data => {
            const videoGrid = document.getElementById('videoGrid');
            videoGrid.innerHTML = ''; // Clear previous results

            // Check if there are any items
            if (data.items && data.items.length > 0) {
                data.items.forEach(video => {
                    // Create video item elements
                    const videoItem = document.createElement('div');
                    videoItem.className = 'video-item';
                    videoItem.onclick = () => playVideo(video.id.videoId); // Add play functionality

                    const thumbnail = document.createElement('img');
                    thumbnail.className = 'video-thumbnail';
                    thumbnail.src = video.snippet.thumbnails.high.url;
                    thumbnail.alt = video.snippet.title;

                    const videoInfo = document.createElement('div');
                    videoInfo.className = 'video-info';

                    const title = document.createElement('h4');
                    title.className = 'video-title';
                    title.innerText = video.snippet.title;

                    const details = document.createElement('div');
                    details.className = 'video-details';

                    const channelName = document.createElement('span');
                    channelName.className = 'channel-name';
                    channelName.innerText = video.snippet.channelTitle;

                    const publishedAt = document.createElement('span');
                    publishedAt.className = 'video-time';
                    publishedAt.innerText = new Date(video.snippet.publishedAt).toLocaleDateString();

                    // Append details to video item
                    details.appendChild(channelName);
                    details.appendChild(publishedAt);
                    videoInfo.appendChild(title);
                    videoInfo.appendChild(details);
                    videoItem.appendChild(thumbnail);
                    videoItem.appendChild(videoInfo);

                    // Append video item to the grid
                    videoGrid.appendChild(videoItem);
                });
            } else {
                videoGrid.innerHTML = '<p>No videos found.</p>'; // Display a message if no results
            }
        })
        .catch(error => {
            console.error('Error fetching videos:', error);
        });
}

function playVideo(videoId) {
    const mainVideo = document.getElementById('mainVideo');
    // Update the iframe source to the selected video
    mainVideo.src = `https://www.youtube.com/embed/${videoId}?autoplay=1`; // Autoplay the video
}


    </script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
