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
            @foreach (App\Models\Page::where('parent_id',10)->orderBy('position')->get() as $key=>$page)
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="prctc_bx">
					<a href="#">
                        @php
                            $image="frontend/images/prctc00".($key+1).".png"
                        @endphp
					<div class="prctc_icn"><img src="{{asset($image)}}" alt="prctc"></div>
					<h3>{{$page->name}}</h3></a>
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
