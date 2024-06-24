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
