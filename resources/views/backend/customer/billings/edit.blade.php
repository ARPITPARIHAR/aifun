@extends('backend.layouts.app')
@section('meta_title',__('Edit Case'))

@section('page_name',__('Edit Case'))

@section('page_description',__('Edit Case'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Edit Case') }}</a>
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
                <form action="{{ route('admin.billings.update',encrypt($billing->id)) }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Customer') }}</label>
                        <div class="col-sm-10">
                            <select name="customer" class="form-control @error('customer') form-control-danger @enderror">
                                <option value="">{{ __('Select Customer') }}</option>
                                @foreach (App\Models\User::whereIn('user_type',['customer'])->orderBy('name')->get() as $customer)
                                    <option value="{{ $customer->id }}" @selected($customer->id==(old('customer') ?? $billing->user_id))>{{ $customer->name }}</option>
                                @endforeach
                            </select>
                            <span class="messages">
                                @error('customer')
                                    <p class="text-danger error">{{ $message }}</p>
                                @else
                                    {{-- <p class="text-muted">{{ __("Leave it blank if you don't want to insert it on any page.") }}</p> --}}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Amount') }}</label>
                        <div class="col-sm-10">
                            <input type="number" name="amount" id="amount" value="{{ old('amount') ?? $billing->amount }}" placeholder="{{ __('Enter Amount') }}" class="form-control @error('amount') form-control-danger @enderror">
                           <span class="messages">
                                @error('amount')
                                    <p class="text-danger error">{{ $message }}</p>
                                @else
                                    <p class="text-muted">{{ __('') }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Payment Date') }}</label>
                        <div class="col-sm-10">
                            <input type="date" name="payment_date" id="payment_date" value="{{ old('payment_date') ?? $billing->payment_date }}" placeholder="{{ __('Choose Payment Date') }}" class="form-control @error('payment_date') form-control-danger @enderror">
                           <span class="messages">
                                @error('payment_date')
                                    <p class="text-danger error">{{ $message }}</p>
                                @else
                                    <p class="text-muted">{{ __('') }}</p>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Payment Mode') }}</label>
                        <div class="col-sm-10">
                            <select name="payment_mode" class="form-control @error('payment_mode') form-control-danger @enderror">
                                <option value="">{{ __('Select Payment Mode') }}</option>
                                <option value="cash" @selected('cash'==(old('payment_mode') ?? $billing->payment_mode))>{{ __('Cash') }}</option>
                                <option value="online" @selected('online'==(old('payment_mode') ?? $billing->payment_mode))>{{ __('Online') }}</option>
                                <option value="cheque" @selected('cheque'==(old('payment_mode') ?? $billing->payment_mode))>{{ __('Cheque') }}</option>
                                <option value="other" @selected('other'==(old('payment_mode') ?? $billing->payment_mode))>{{ __('Other') }}</option>
                            </select>
                            <span class="messages">
                                @error('payment_mode')
                                    <p class="text-danger error">{{ $message }}</p>
                                @else
                                    {{-- <p class="text-muted">{{ __("Leave it blank if you don't want to insert it on any page.") }}</p> --}}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                        <div class="col-sm-10">
                            <textarea name="description" id="description" placeholder="{{ __('Enter Description') }}" class="form-control @error('description') form-control-danger @enderror">{{ old('description') ?? $billing->description }}</textarea>
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
</script>
@endsection
@section('styles')

@endsection
