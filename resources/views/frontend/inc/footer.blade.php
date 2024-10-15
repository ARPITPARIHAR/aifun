<footer style="background-color: #003f62";>
	<div class="container-fluid"   >
		<div class="row">
			<div class="col-lg-4 col-md-4">
				<div class="ftr_box">
					<div class="ftr_logo">
						<div class="logo" style="font-size: 1.5rem; font-weight: bold; color: white;">
                            <a href="/home" style="color: white; text-decoration: none;">AIFUNFACTORY</a>
                        </div>
					</div>
					<p></p>
				</div>
			</div>
			<div class="col-lg-4 col-md-4">
				<div class="ftr_box">
					<h4>Links</h4>
					<ul>
						<li><a href="{{route('home')}}">Home</a></li>
						<li><a href="{{ route('practice-areas.index') }}">About</a></li>
						{{-- <li><a href="">Lawyers</a></li> --}}
						<!--<li><a href="{{ route('publications') }}">Publications</a></li>-->
						<li><a href="">Careers</a></li>
						<li><a href="">Contact Us</a></li>
                        <li><a href="">Blog</a></li>
					</ul>
				</div>
			</div>
			{{-- <div class="col-lg-3 col-md-4">
				<div class="ftr_box">
					<h4>Practice Areas</h4>
					<ul>
                        @foreach (App\Models\PracticeArea::select('title','slug')->orderBy('position')->take(6)->get() as $practice_area)
						    <li><a href="{{ route('practice-area.show',$practice_area->slug) }}">{{ $practice_area->title }}</a></li>
                        @endforeach
					</ul>
				</div>
			</div> --}}
			<div class="col-lg-4 col-md-4">
				<div class="ftr_box">
					<h4>Have a Questions?</h4>
					<ul class="adrs">
						<li>
							<span class="icon"><img src="{{asset('frontend/images/ftr_map.png')}}"></span>
							<span class=" text"></span>
						</li>
						<li>
							<span class="icon"><img src="{{asset('frontend/images/ftr_cll.png')}}"></span>
							<span class="text">
						<li>
							<span class="icon"><img src="{{asset('frontend/images/ftr_mail.png')}}"></span>
							<span class="text"></span>
						</li>
					</ul>
					<ul class="social">
						<li>
							<a href="{{businessSetting(1)->instagram ?? '#'}}"><img src="{{asset('frontend/images/hdr_scl001.png')}}"></a>
						</li>
						<li>
							<a href="{{businessSetting(1)->linked_in ?? '#'}}"><img src="{{asset('frontend/images/hdr_scl002.png')}}"></a>
						</li>
					</ul>
				</div>
			</div>

			<div class="col-md-12">
				<div class="copyright">© 2024 AIFUNFACTORY | All Rights Reserved</div>
			</div>
		</div>
	</div>
</footer>
