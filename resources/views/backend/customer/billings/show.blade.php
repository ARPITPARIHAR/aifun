@extends('backend.layouts.app')
@section('meta_title',__('Bill'))

@section('page_name',__('Bill'))

@section('page_description',__('Bill'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Bill') }}</a>
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
