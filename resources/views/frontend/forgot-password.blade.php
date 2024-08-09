@extends('frontend.layouts.app')
@section('meta_title','Forgot Password | '.env('APP_NAME'))
@section('meta_description','Gogra Legal')
@section('content')
<section class="inner_banner">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 no_padding">
				<div class="inr_bnr">
					<img src="images/banner_inner.jpg" alt="bnr">
				</div>
			</div>	
		</div>
	</div>	
</section>

<section class="login">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="login_inr">
					<h3>Recover password</h3>
					@if(session('success'))
					    <p class="text-success">{{session('success')}}</p>
					    @elseif(session('error'))
					    <p class="text-success">{{session('error')}}</p>
					@elseif($message)
					    <p class="text-success">{{$message}}</p>
					@else
					    <p>Enter your email to recover your password:</p>
					@endif
					@if($email)
					    <form action="{{route('reset-password')}}" method="post">
					        @csrf
    						<div class="form-group">
    							<input class="form-control" type="email" name="email" value="{{$email}}" readonly placeholder="Enter Your Register E-mail">
    							 @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                 @enderror
    						</div>
    						    <div class="form-group">
    							    <input class="form-control" type="password" name="temp_password" placeholder="Enter Temp Password">
    							     @error('temp_password')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
    						    </div>
    						    <div class="form-group">
    							    <input class="form-control" type="password" name="password" placeholder="Enter New Password">
    							     @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
    						    </div>
    						    <div class="form-group">
    							    <input class="form-control" type="password" name="password_confirmation" placeholder="Enter Confirmed Password">
    						    </div>
    						
    						<div class="form-group">
    						    <button type="submit" class="btn">Recover</button>
    						</div>
    						<p>Remember your password?<a href="{{route('login')}}"> Back to login</a></p>
    					</form>
					@else
					<form action="" method="get">
    					   <div class="form-group">
    						    <input class="form-control" type="email" name="email" placeholder="Enter Your Register E-mail">
    						     @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
    					   </div>
    					   <div class="form-group">
    						   <button type="submit" class="btn">Recover</button>
    					   </div>
						<p>Remember your password?<a href="{{route('login')}}"> Back to login</a></p>
					</form> 
					     
					@endif
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
