<section class="main_banner">
	<div class="bnr_slide owl-carousel owl-theme">
        @foreach (App\Models\Slider::take(5)->latest()->get() as $slider)
		<div class="item" style="background-image: url({{asset($slider->image)}});">
			<div class="itm_inr">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-7">
							<h2>{{ $slider->title }}</h2>
							<p>{{ $slider->brief_description }}</p>
							{{-- <a class="sld_btn" href="#">Make an Appointment</a> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
        @endforeach
	</div>
</section>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIFUN Factory - Video Platform</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>

.search-bar {
        display: flex;
        justify-content: center;
        padding: 15px;
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
    .search-container input[type="text"]::placeholder {
        color: #999;
        font-style: italic;
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
    .search-container button i {
        font-size: 1.2rem;
    }
    .search-container button:hover {
        background-color: #004f82;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .search-container input[type="text"] {
            padding: 10px 12px;
        }
        .search-container button {
            padding: 10px 12px;
        }
    }
    @media (max-width: 576px) {
        .search-container {
            max-width: 90%;
        }
        .search-container input[type="text"] {
            font-size: 0.9rem;
        }
        .search-container button i {
            font-size: 1rem;
        }
    }


        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .header {
            background-color: #003f62;
            color: white;
            padding: 10px 0;
        }
        .header h1 {
            margin: 0;
            font-size: 2.5rem;
        }
        .search-bar {
            padding: 20px;
            background-color: #f8f9fa;
        }
        .search-bar input {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
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
        <iframe id="mainVideo" src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allowfullscreen></iframe>
    </div>

    <!-- Video Grid -->
    <div class="container">
        <div class="video-grid">
            <!-- Example video item - replace with dynamic video items -->
            <div class="video-item">
                <img src="https://img.youtube.com/vi/dQw4w9WgXcQ/hqdefault.jpg" alt="Video Thumbnail">
                <h4>Sample Video Title</h4>
            </div>
            <!-- More video items... -->
        </div>
    </div>

    <script>
        // JavaScript for handling search and video selection can go here
        document.getElementById('search').addEventListener('input', function() {
            // Implement search functionality here
        });

        // Example video selection handling
        document.querySelectorAll('.video-item').forEach(item => {
            item.addEventListener('click', function() {
                const videoId = 'dQw4w9WgXcQ'; // Replace with the video ID dynamically
                document.getElementById('mainVideo').src = `https://www.youtube.com/embed/${videoId}`;
            });
        });
    </script>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
