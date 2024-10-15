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
<style>
    .disclaimer-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
</style>
<title>@yield('meta_title')</title>

</head>
<body>
@include('frontend.inc.header')
    @yield('content')
@include('frontend.inc.footer')
{{-- <div class="modal fade" id="disclaimer-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-keyboard="false"  data-bs-backdrop='static' aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">Disclaimer</h5>
        </div>
        <div class="modal-body" id="disclaimer-modal-boy">
            <div class="disclaimer-container">
                <p>The Bar Council of India does not permit solicitation of work and advertising by legal practitioners and advocates. By Gogra Legal website (our website), the user acknowledges that:</p>
                <ul>
                    <li>The user wishes to gain more information about us for his/her information and use. He/She also acknowledges that there has been no attempt by us to advertise or solicit work.</li>
                    <li>Any information obtained or downloaded by the user from our website does not lead to the creation of the client – attorney relationship between the Firm and the user.</li>
                    <li>None of the information contained in our website amounts to any form of legal opinion or legal advice.</li>
                    <li>Our website uses cookies to improve your user experience. By using our site, you agree to our use of cookies. To find out more, please see our Cookies Policy & Privacy Policy.</li>
                    <li>All information contained in our website is the intellectual property of the Firm.</li>
                </ul>
            </div>
        </div>
        <form id="disclaimer-form" method="POST" action="{{ route('accept-disclaimer') }}">
            @csrf
            <div class="modal-footer">
                <div class="form-check">
                    <input type="checkbox" name="accept" class="form-check-input" id="accept-checkbox" required="">
                    <label class="form-check-label" for="accept-checkbox">I Accept</label>
                </div>
            <button type="submit" class="btn-sm btn-primary">Continue to  Gogralegal</button>
            </div>
        </form>
      </div>
    </div>
</div> --}}
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
    @if (request()->session()->has('is_disclaimer'))
    @else
        <script>
            $( document ).ready(function() {
                $('#disclaimer-modal').modal('show');
            });
        </script>
    @endif
</body>
</html>
