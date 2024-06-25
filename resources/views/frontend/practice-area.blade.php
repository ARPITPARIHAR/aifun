@extends('frontend.layouts.app')
@section('meta_title',$practice_area->title.' | '.env('APP_NAME'))
@section('meta_description','Gogra Legal')
@section('content')
<section class="inner_banner">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 no_padding">
				<div class="inr_bnr">
					<img src="{{$practice_area->header_img}}" alt="bnr">
				</div>
			</div>
		</div>
	</div>
</section>

<section class="cmpny_ovrvw about">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 col-md-12">
				<div class="cmpny_imag">
					<img src="{{$practice_area->thumbnail_img}}" alt="cmpny_imag">
				</div>
			</div>
			<div class="col-lg-7 col-md-12">
				<div class="cmpny_text">
					<span>{{$practice_area->title}}</span>
					{!!$practice_area->description!!}
				</div>
			</div>
		</div>
	</div>
</section>

    <section class="hm_clnts">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @php
                        $cleint=App\Models\Page::findOrFail(30);
                    @endphp
                    @if ($cleint)
                        <div class="head text-center">
                            <span>{{ $cleint->title }}</span>
                            <h2>{{ $cleint->name }}</h2>
                            <p>{{ $cleint->brief_description }}</p>
                        </div>
                    @endif
                    <div class="hm_clnt owl-carousel owl-theme">
                        @foreach (App\Models\Client::where('practice_id',$practice_area->id)->get() as $client)
                            <div class="item"><img src="{{asset($client->logo)}}" alt="{{ $client->title }}"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('modal')

@endsection
@section('scripts')

@endsection
@section('styles')

@endsection
