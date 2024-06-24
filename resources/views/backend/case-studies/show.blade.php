@extends('backend.layouts.app')
@section('meta_title',__('Cash'))

@section('page_name',__('Cash'))

@section('page_description',__('Cash'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Cash') }}</a>
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
