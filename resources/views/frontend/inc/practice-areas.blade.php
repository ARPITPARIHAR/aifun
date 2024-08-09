<section class="hm_srvcs">
	<div class="container">
		<div class="row">
            @foreach (App\Models\PracticeArea::where('active',1)->orderBy('title')->get() as $practice_area)
			<div class="col-lg-4 col-md-6">
				<div class="srvc_bx">
					<div class="srvc_icn">
						<div class="icn_inr">
							<img src="{{asset($practice_area->icon)}}" alt="">
						</div>
					</div>
					<div class="srvc_txt">
						<h3>{{ $practice_area->title }}</h3>
						<p>{{ $practice_area->brief_description }}</p>
					</div>
				</div>
			</div>
            @endforeach
	</div>
</section>
