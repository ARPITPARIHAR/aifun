@extends('backend.layouts.app')
@section('meta_title',__('Cases'))

@section('page_name',__('Cases'))

@section('page_description',__('Cases'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Cases') }}</a>
    </li>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <!-- Zero config.table start -->
        <div class="card">
            <div class="card-header row">
                <div class="col-sm-2">
                    <a href="{{ route('admin.cases.create') }}" class="btn btn-sm btn-primary">{{ __('Add Case') }}</a>
                </div>
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Customer Name') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Fee') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Updated At') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cases as $key=>$case)
                            <tr>
                                <td>{{ ($key+1) + ($cases->currentPage() - 1)*$cases->perPage() }}</td>
                                <td>{{ $case->title }}</td>
                                <td>{{ optional($case->user)->name }}</td>
                                <td>{{ $case->description }}</td>
                                <td>{{ format_price($case->fee) }}</td>
                                <td>{{ Str::headline($case->status) }}</td>
                                <td>{{ date('d-m-Y h:iA',strtotime($case->updated_at)) }}</td>
                                <td>
                                    <a href="{{ route('admin.cases.edit',encrypt($case->id)) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                                    <a href="{{ route('admin.cases.delete',encrypt($case->id)) }}" class="btn btn-sm btn-danger">{{ __('Delete') }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Customer Name') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Fee') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Updated At') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-5">
                        <div class="dataTables_info" id="simpletable_info" role="status" aria-live="polite"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="float-sm-right">
                            {{ $cases->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('modal')

@endsection
@section('scripts')

@endsection
@section('styles')

@endsection
