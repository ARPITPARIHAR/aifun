@extends('backend.layouts.app')
@section('meta_title',__('Blank Page'))

@section('page_name',__('Blank Page'))

@section('page_description',__('Blank Page'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Blank Page') }}</a>
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
