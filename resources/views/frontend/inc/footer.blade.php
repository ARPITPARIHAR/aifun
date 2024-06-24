<footer>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-12">
				<div class="ftr_box">
					<div class="ftr_logo">
						<a href="#"><img src="{{businessSetting(1)->footer_logo}}" alt="{{env('APP_NAME')}}"></a>
					</div>
					<p>{{businessSetting(1)->brief_description}}</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-4">
				<div class="ftr_box">
					<h4>Links</h4>
					<ul>
						<li><a href="{{route('home')}}">Home</a></li>
						<li><a href="{{ route('practice-areas.index') }}">Practice Areas</a></li>
						<li><a href="{{ route('lawyers') }}">Lawyers</a></li>
						<li><a href="{{ route('publications') }}">Publications</a></li>
						<li><a href="{{ route('careers') }}">Careers</a></li>
						<li><a href="{{route('contact-us')}}">Contact Us</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-4">
				<div class="ftr_box">
					<h4>Practice Areas</h4>
					<ul>
                        @foreach (App\Models\PracticeArea::select('title','slug')->orderBy('title')->take(6)->get() as $practice_area)
						    <li><a href="{{ route('practice-area.show',$practice_area->slug) }}">{{ $practice_area->title }}</a></li>
                        @endforeach
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-4">
				<div class="ftr_box">
					<h4>Have a Questions?</h4>
					<ul class="adrs">
						<li>
							<span class="icon"><img src="{{asset('frontend/images/ftr_map.png')}}"></span>
							<span class=" text">{{businessSetting(1)->address}}</span>
						</li>
						<li>
							<span class="icon"><img src="{{asset('frontend/images/ftr_cll.png')}}"></span>
							<span class="text">{{businessSetting(1)->contact_numbers}}</span>
						</li>
						<li>
							<span class="icon"><img src="{{asset('frontend/images/ftr_mail.png')}}"></span>
							<span class="text">{{businessSetting(1)->email}}</span>
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
				<div class="copyright">© 2019-{{ date('Y') }} - {{ businessSetting(1)->business_name }} | All Rights Reserved</div>
			</div>
		</div>
	</div>
</footer>
