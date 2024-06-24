<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="@yield('meta_description')">
<meta name="author" content="{{env('AUTHOR')}}">

<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/owl.carousel.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/responsive.css')}}">

@yield('styles')
<title>@yield('meta_title')</title>

</head>
<body>
@include('frontend.inc.header')
    @yield('content')
@include('frontend.inc.footer')
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/owl.carousel.js')}}"></script>
@yield('scripts')

<script>

window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

function sdbr_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function sdbr_close() {
  document.getElementById("mySidebar").style.display = "none";
}


$('.bnr_slide').owlCarousel({
	loop: true,
	margin: 10,
	nav: false,
	dots: true,
	autoplay: true,
	autoplayTimeout: 5000,
	navText : ['<img src="images/prev.png">','<img src="images/next.png">'],
	responsive: {
	  0: {
		items: 1
	  },
	  768: {
		items: 1
	  },
	  1200: {
		items: 1
	  }
	}
});

$('.hm_clnt').owlCarousel({
	loop: true,
	margin: 10,
	nav: false,
	dots: false,
	autoplay: true,
	autoplayTimeout: 3000,
	navText : ['<img src="images/prev.png">','<img src="images/next.png">'],
	responsive: {
	  0: {
		items: 2
	  },
	  768: {
		items: 3
	  },
	  1200: {
		items: 4
	  }
	}
});
</script>

</body>
</html>
