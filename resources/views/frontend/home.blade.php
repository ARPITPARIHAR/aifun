@extends('frontend.layouts.app')
@section('meta_title',"Welcome To | ".env('APP_NAME'))
@section('meta_description','Gogra Legal')
@section('content')
    @include('frontend.inc.slider')
    @include('frontend.inc.laws')
    @include('frontend.inc.company-overview')
    @include('frontend.inc.case-study')
    @include('frontend.inc.clients')
@endsection
@section('modal')

@endsection
@section('scripts')

@endsection
@section('styles')

@endsection
