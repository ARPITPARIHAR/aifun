@extends('backend.layouts.app')
@section('meta_title',__('Profile'))

@section('page_name',__('Profile'))

@section('page_description',__('Profile'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Profile') }}</a>
    </li>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <!-- Basic Form Inputs card start -->
        <div class="card">
            <div class="card-header">
               @session('success')
               <h5 class="text-success">{{ session('success') }}</h5>
               @else
                <h5>@yield('page_name')</h5>
               @endsession
            </div>
            <div class="card-block">
                <form action="{{ route('admin.profile.update') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" value="{{ old('name') ?? $profile->name }}" placeholder="{{ __('Enter Business Name') }}" class="form-control @error('name') form-control-danger @enderror">
                           <span class="messages">
                                @error('name')
                                    <p class="text-danger error">{{ $message }}</p>
                                @else
                                    <p class="text-muted">{{ __('') }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" id="email" value="{{ old('email') ?? $profile->email }}" placeholder="{{ __('Enter Email') }}" class="form-control @error('email') form-control-danger @enderror">
                            @error('email')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Avatar</label>
                        <div class="col-sm-10">
                            <input type="file" name="avatar" id="avatar" class="form-control @error('avatar') form-control-danger @enderror">
                            @error('avatar')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('New Password') }}</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" id="password" value="{{ old('password') }}" placeholder="{{ __('New Password') }}" class="form-control @error('password') form-control-danger @enderror">
                            @error('password')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __("If you don't want to change the password, leave it blank.") }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Password Confirmation') }}</label>
                        <div class="col-sm-10">
                            <input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="{{ __('Password Confirmation') }}" class="form-control @error('password_confirmation') form-control-danger @enderror">
                            @error('password_confirmation')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                {{-- <p class="text-muted">{{ __("If you don't want to change the password, leave it blank.") }}</p> --}}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <div class="checkbox-fade fade-in-primary" >
                                <label>
                                    <input type="checkbox" id="show-password">
                                    <span class="cr">
                                        <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                    </span>
                                    <span>{{ __('Show Password') }}</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div>
                                <button type="submit" class="btn btn-primary float-sm-right">{{ __('Update') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')

@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('backend/plugins/i18next/js/i18next.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/plugins/i18next-xhr-backend/js/i18nextXHRBackend.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/plugins/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/plugins/jquery-i18next/js/jquery-i18next.min.js') }}"></script>
<script>
     $("#show-password").click(function (){
        var password_input = document.getElementById("password");
        var conf_password_input = document.getElementById("password_confirmation");
        if (password_input.type === "password") {
            password_input.type = "text";
        } else {
            password_input.type = "password";
        }
        console.log(password_input.type);
        if (conf_password_input.type === "password") {
            conf_password_input.type = "text";
        } else {
            conf_password_input.type = "password";
        }
    });
</script>
@endsection
@section('styles')

@endsection
