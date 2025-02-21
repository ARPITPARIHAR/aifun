@extends('backend.layouts.app')
@section('meta_title',__('Add Blog'))

@section('page_name',__('Add Blog'))

@section('page_description',__('Add Blog'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Add Blog') }}</a>
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
                <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" value="{{ old('title')}}" placeholder="{{ __('Enter Page Title') }}" class="form-control @error('title') form-control-danger @enderror">
                           <span class="messages">
                                @error('title')
                                    <p class="text-danger error">{{ $message }}</p>
                                @else
                                    <p class="text-muted">{{ __('If you want to give a title other than your name then') }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Meta Title') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title')}}" placeholder="{{ __('Enter Meta Title') }}" class="form-control @error('meta_title') form-control-danger @enderror">
                            @error('meta_title')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Meta Description') }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="meta_description" id="meta_description" value="{{ old('meta_description')}}" placeholder="{{ __('Enter Meta Description') }}" class="form-control @error('meta_description') form-control-danger @enderror">
                            @error('meta_description')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Brief Description') }}</label>
                        <div class="col-sm-10">
                            <textarea name="brief_description" id="brief_description" placeholder="{{ __('Enter Brief Description') }}" class="form-control @error('brief_description') form-control-danger @enderror">{{ old('brief_description')}}</textarea>
                            @error('brief_description')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Image') }}</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" id="image" class="form-control @error('image') form-control-danger @enderror">
                            @error('image')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                        <div class="col-sm-10">
                            <textarea name="description" id="description" placeholder="{{ __('Enter Description') }}" class="form-control @error('description') invalid @enderror">{{ old('description')}}</textarea>
                            @error('description')
                                <p class="text-danger error">{{ $message }}</p>
                            @else
                                <p class="text-muted">{{ __('') }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-8">
                            <div>
                                <button type="submit" class="btn btn-primary float-sm-right">{{ __('Save') }}</button>
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
    <script type="text/javascript" src="{{ asset('backend/plugins/summernote/summernote.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#description').summernote();
        });
    </script>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote.css') }}">
@endsection
