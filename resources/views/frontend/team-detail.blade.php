@extends('frontend.layouts.app')
@section('meta_title',$team->name.' | '.env('APP_NAME'))
@section('meta_description','Gogra Legal')
@section('content')
<section class="cmpny_ovrvw about">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 col-md-12">
				<div class="cmpny_imag">
					<img src="{{$team->thumbnail_img}}" alt="{{$team->name}}">
				</div>
			</div>
			<div class="col-lg-7 col-md-12">
				<div class="cmpny_text">
					<span>{{$team->name}}</span>
					<span>{{$team->designation}}</span>
					<span>{{$team->brief_description}}</span>
					{!!$team->description!!}
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
