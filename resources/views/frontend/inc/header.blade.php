<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Title</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<header class="header">
    <div class="main_head" id="myHeader" style="background-color: #003f62; color: white !important;">

        <div class="row">
            <div class="col-lg-3 col-md-3 d-flex justify-content-center">
                <div class="logo" style="font-size: 1.5rem; font-weight: bold; color: white;">
                    <a href="/" style="color: white; text-decoration: none;">AIFUNFACTORY</a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="menus">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <button class="navbar-toggler" type="button" onclick="sdbr_open()">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="mySidebar">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <button onclick="sdbr_close()" class="close">&times;</button>
                                <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}">Home</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">About</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach (App\Models\Page::where('parent_id',2)->where('active',1)->orderBy('position')->get() as $page)
                                            <li><a class="dropdown-item" href="">{{ Str::headline($page->name) }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                {{-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{ route('practice-areas.index') }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Practice Areas</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="{{ route('practice-areas.index') }}">{{ __('All') }}</a></li>
                                        @foreach (App\Models\PracticeArea::where('active',1)->orderBy('position')->get() as $practice_areas)
                                            <li><a class="dropdown-item" href="{{ route('practice-area.show', $practice_areas->slug) }}">{{ Str::headline($practice_areas->title) }}</a></li>
                                        @endforeach
                                    </ul>
                                </li> --}}
                                <li class="nav-item"><a class="nav-link" href="{{ route('faceswap') }}">Faceswap</a></li>
                                <li class="nav-item"><a class="nav-link" href="">Blog</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('contact-us') }}">Contact</a></li>
                                @if (auth()->user())
                                    <li class="nav-item"><a class="nav-link" href="@if(auth()->user()->user_type=='admin'){{ route('admin.dashboard') }}@else {{ route('customer.dashboard') }}@endif">Dashboard</a></li>
                                @else
                                    {{-- <li class="nav-item"><a class="nav-link" href="{{ route('login-register') }}">Client Sign Area</a></li> --}}
                                @endif
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    function sdbr_open() {
        document.getElementById("mySidebar").classList.add("show");
    }

    function sdbr_close() {
        document.getElementById("mySidebar").classList.remove("show");
    }
</script>
<style>
    .navbar-nav {
        justify-content: center!important; /* Center the nav items */
        width: 100%;
    }
    .navbar-nav .nav-link {
        color: white !important;
    }
    .navbar-nav .nav-link:hover {
        color: #ddd;
    }
</style>
</body>
</html>
