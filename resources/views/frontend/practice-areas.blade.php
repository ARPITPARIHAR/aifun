@extends('frontend.layouts.app')
@section('meta_title','Practice Areas | '.env('APP_NAME'))
@section('meta_description','Gogra Legal')
@section('content')
<section class="inner_banner">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 no_padding">
				<div class="inr_bnr">
					<img src="{{asset('frontend/images/banner_inner.jpg')}}" alt="bnr">
				</div>
			</div>
		</div>
	</div>
</section>

<section class="prctc">
	<div class="container">
		<div class="row">
            @foreach (App\Models\PracticeArea::orderBy('title')->get() as $key=>$practice_area)
            <div class="col-lg-3 col-md-4 col-sm-6">
				<div class="prctc_bx">
					<a href="{{ route('practice-area.show',$practice_area->slug) }}">
					<div class="prctc_icn"><img src="{{asset($practice_area->icon)}}" alt="{{$practice_area->title}}"></div>
					<h3>{{$practice_area->title}}</h3></a>
				</div>
			</div>
            @endforeach
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
