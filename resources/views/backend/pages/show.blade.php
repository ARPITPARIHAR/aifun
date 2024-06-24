@extends('backend.layouts.app')
@section('meta_title',__('Page'))

@section('page_name',__('Page'))

@section('page_description',__('Page'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Page') }}</a>
    </li>
@endsection
@section('content')
@endsection
@section('modal')

@endsection
@section('scripts')

@endsection
@section('styles')

@endsection
