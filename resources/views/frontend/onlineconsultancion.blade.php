@extends('frontend.layouts.app')
@section('meta_title','Contact To | '.env('APP_NAME'))
@section('meta_description','Gogra Legal')
@section('content')

<section class="login">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="login_inr">
					<h3>Online Consultancy</h3>
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form method="POST" action="{{ route('onlineconsulant.store') }}">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="E-mail" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="phone" placeholder="Contact Number" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="address" placeholder="Location" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="query" placeholder="Query" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>

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
