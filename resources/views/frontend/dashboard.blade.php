<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="{{asset('/frontend/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/frontend/css/owl.carousel.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/frontend/css/owl.theme.default.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/frontend/css/custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/frontend/css/responsive.css')}}">

<title>Gogra Legal</title>

</head>
<body>

@include('frontend.inc.header')

<section class="dashboard">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="d-flex align-items-start">
					<div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="v-pills-first-tab" data-bs-toggle="pill" data-bs-target="#v-pills-first" type="button" role="tab" aria-controls="v-pills-first" aria-selected="true"><img src="{{asset('frontend/images/nav001.png')}}" alt="nav_icn">
                            Dashboard
                        </a>
						<a class="nav-link" id="v-pills-second-tab" data-bs-toggle="pill" data-bs-target="#v-pills-second" type="button" role="tab" aria-controls="v-pills-second" aria-selected="false"><img src="{{asset('frontend/images/nav002.png')}}" alt="nav_icn">
                            Profile
                        </a>
						<a class="nav-link" id="v-pills-third-tab" data-bs-toggle="pill" data-bs-target="#v-pills-third" type="button" role="tab" aria-controls="v-pills-third" aria-selected="false"><img src="{{asset('frontend/images/nav003.png')}}" alt="nav_icn">
                            Case Status
                        </a>
						<a class="nav-link" id="v-pills-four-tab" data-bs-toggle="pill" data-bs-target="#v-pills-fourth" type="button" role="tab" aria-controls="v-pills-fourth" aria-selected="false"><img src="{{asset('frontend/images/nav004.png')}}" alt="nav_icn">
                            Billing
                        </a>
						<a class="nav-link" href="{{ route('logout') }}"><img src="{{asset('frontend/images/nav005.png')}}" alt="nav_icn">
                            Logout
                        </a>
					</div>
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-first" role="tabpanel" aria-labelledby="v-pills-first-tab">
							<div class="dshbrd_dtls">
								@session('success')
                                    <h2 class="text-success">{{ __('Profile updated successfully') }}</h2>
                                @else
                                    <h2>Dashbaord</h2>
                                @endsession
							</div>
						</div>
						<div class="tab-pane fade" id="v-pills-second" role="tabpanel" aria-labelledby="v-pills-second-tab">
							<div class="dshbrd_dtls">
								<div class="card">
                                    <div class="card-header">
                                        @session('success_profile')
                                            <h2 class="text-success">{{ __('Profile updated successfully') }}</h2>
                                        @else
                                            <h2>Profile</h2>
                                        @endsession
                                    </div>
                                    <form action="{{ route('customer.profile-update') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" id="name" value="{{ old('name') ?? auth()->user()->name }}" placeholder="{{ __('Enter Business Name') }}" class="form-control @error('name') form-control-danger @enderror">
                                                <span class="messages">
                                                        @error('name')
                                                            <p class="text-danger error">{{ $message }}</p>
                                                        @else
                                                            <p class="text-muted">{{ __('') }}</p>
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="email" id="email" value="{{ old('email') ?? auth()->user()->email }}" placeholder="{{ __('Enter Email') }}" class="form-control @error('email') form-control-danger @enderror">
                                                    @error('email')
                                                        <p class="text-danger error">{{ $message }}</p>
                                                    @else
                                                        <p class="text-muted">{{ __('') }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">{{ __('New Password') }}</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="password" id="password" value="{{ old('password') }}" placeholder="{{ __('New Password') }}" class="form-control @error('password') form-control-danger @enderror">
                                                    @error('password')
                                                        <p class="text-danger error">{{ $message }}</p>
                                                    @else
                                                        <p class="text-muted">{{ __("If you don't want to change the password, leave it blank.") }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">{{ __('Password Confirmation') }}</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="{{ __('Password Confirmation') }}" class="form-control @error('password_confirmation') form-control-danger @enderror">
                                                    @error('password_confirmation')
                                                        <p class="text-danger error">{{ $message }}</p>
                                                    @else
                                                        {{-- <p class="text-muted">{{ __("If you don't want to change the password, leave it blank.") }}</p> --}}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <div class="checkbox-fade fade-in-primary" >
                                                        <label>
                                                            <input type="checkbox" id="show-password">
                                                            <span class="cr">
                                                                <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                            </span>
                                                            <span>{{ __('Show Password') }}</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div>
                                                        <button type="submit" class="btn btn-primary float-sm-right">{{ __('Update') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
							</div>
						</div>
						<div class="tab-pane fade" id="v-pills-third" role="tabpanel" aria-labelledby="v-pills-third-tab">
							<div class="dshbrd_dtls">
								<div class="card">
                                    <div class="card-header">
                                        <h2>Case Status</h2>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ __('Title') }}</th>
                                                    <th>{{ __('Description') }}</th>
                                                    <th>{{ __('Status') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (App\Models\CustomerCase::where('user_id',auth()->user()->id)->take(10)->latest()->get() as $key=>$case)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $case->title }}</td>
                                                    <td>{{ $case->description }}</td>
                                                    <td>{{ Str::headline($case->status) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
							</div>
						</div>
						<div class="tab-pane fade" id="v-pills-fourth" role="tabpanel" aria-labelledby="v-pills-fourth-tab">
							<div class="dshbrd_dtls">
								<div class="card">
                                    <div class="card-header">
                                        <h2>Billings</h2>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ __('Description') }}</th>
                                                    <th>{{ __('Amount') }}</th>
                                                    <th>{{ __('Payment Mode') }}</th>
                                                    <th>{{ __('Payment Date') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (App\Models\Billing::where('user_id',auth()->user()->id)->take(10)->latest()->get() as $key=>$case)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $case->description }}</td>
                                                    <td>{{ format_price($case->amount) }}</td>
                                                    <td>{{ Str::headline($case->payment_mode) }}</td>
                                                    <td>{{ date('d-m-Y',strtotime($case->payment_date)) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
							</div>
						</div>
						<div class="tab-pane fade" id="v-pills-five" role="tabpanel" aria-labelledby="v-pills-five-tab"> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/owl.carousel.js')}}"></script>

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
