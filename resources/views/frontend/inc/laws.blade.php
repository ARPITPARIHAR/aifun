<section class="hm_srvcs">
	<div class="container">
		<div class="row">
            @foreach (App\Models\Law::orderBy('title')->get() as $law)
			<div class="col-lg-4 col-md-6">
				<div class="srvc_bx">
					<div class="srvc_icn">
						<div class="icn_inr">
							<img src="{{asset($law->icon)}}" alt="hm_srvc">
						</div>
					</div>
					<div class="srvc_txt">
						<h3>{{ $law->title }}</h3>
						<p>{{ $law->brief_description }}</p>
					</div>
				</div>
			</div>
            @endforeach
	</div>
</section>
