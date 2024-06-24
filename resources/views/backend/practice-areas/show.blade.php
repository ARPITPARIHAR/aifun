@extends('backend.layouts.app')

@section('meta_title',__('Practice Area'))
@section('page_name',__('Practice Area'))
@section('page_description',__('Practice Area'))

@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Practice Area') }}</a>
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
