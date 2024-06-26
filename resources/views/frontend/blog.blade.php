@extends('frontend.layouts.app')
@section('meta_title','Contact To | '.env('APP_NAME'))
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

<section class="blogs">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="head text-center">
					<span>Blogs</span>
					<h2>News and Insights</h2>
				</div>
		
			@foreach (App\Models\Blog::take(5)->latest()->get() as $blog)
                <div class="col-md-4">
                    <div class="blg_box">
                        <img src="{{ asset($blog->image) }}" alt="blog">
                        <div class="content">
                            <span>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}</span>
                            <p>{{ $blog->brief_description }}</p>
                            <a href="#" class="seemore">See More...</a>
                        </div>
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
