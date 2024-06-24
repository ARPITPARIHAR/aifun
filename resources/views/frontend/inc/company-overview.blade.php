@php
    $company_overview=App\Models\Page::findOrFail(28);
@endphp
<section class="cmpny_ovrvw">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 col-md-12">
				<div class="cmpny_imag">
					<img src="{{asset($company_overview->thumbnail_img)}}" alt="{{ $company_overview->title }}">
				</div>
			</div>
			<div class="col-lg-7 col-md-12">
				<div class="cmpny_text">
					<span>{{ $company_overview->name }}</span>
					<h2>{{ $company_overview->title }}</h2>
					{!! $company_overview->description !!}
					{{-- <a class="learn" href="#">Learn More > </a> --}}
				</div>
			</div>
		</div>
	</div>
</section>
