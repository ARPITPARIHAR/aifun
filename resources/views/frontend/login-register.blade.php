@extends('frontend.layouts.app')
@section('meta_title','Welcome To | '.env('APP_NAME'))
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

<section class="login rgstr">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="login_inr">
					<h3>Login</h3>
					<p>Enter your email and password to login:</p>
					 <form action="{{ route('login') }}" method="POST">
                        @csrf
						<div class="form-group">
							<input class="form-control" type="email" name="email" placeholder="E-mail">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
						</div>
						<div class="form-group">
							<input class="form-control" type="password" name="password" placeholder="Password">
							@error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
						</div>
						<div class="form-group">
                            <button type="submit" class="btn">Login</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-6">
				<div class="login_inr sgnup">
					<h3>Sign Up</h3>
					<p>Please fill in the information below:</p>
					 <form action="{{ route('register') }}" method="POST">
                        @csrf
						<div class="form-group">
							<input class="form-control" type="text" value="{{ old('name') }}" name="name" placeholder="First Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
						</div>
						<div class="form-group">
							<input class="form-control" type="email" value="{{ old('email') }}" name="email" placeholder="E-mail">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
						</div>
						<div class="form-group">
							<input class="form-control" type="password" value="{{ old('password') }}" name="password" placeholder="Password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
						</div>
						<div class="form-group">
							<input class="form-control" type="phone" value="{{ old('phone') }}" name="phone" placeholder="Phone Number">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
						</div>
						<div class="form-group">
							<input class="form-control" type="text" value="{{ old('address') }}" name="address" placeholder="address">
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
						</div>
						<div class="form-group" style="text-align: left;">
							<input type="checkbox" id="rgstr" name="rgstr" value="0">
							<label for="rgstr"> Register to our newsletter</label>
						</div>
						<div class="form-group">
                            <button type="submit" class="btn">Create Account</button>
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
