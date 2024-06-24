@extends('backend.layouts.app')
@section('meta_title',__('Case Studies'))

@section('page_name',__('Case Studies'))

@section('page_description',__('Case Studies'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Case Studies') }}</a>
    </li>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <!-- Zero config.table start -->
        <div class="card">
            <div class="card-header row">
                <div class="col-sm-2">
                    <a href="{{ route('admin.case-studies.create') }}" class="btn btn-sm btn-primary">{{ __('Add Case Studies') }}</a>
                </div>
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Thumbnail') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Updated At') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($case_studies as $key=>$case_study)
                            <tr>
                                <td>{{ ($key+1) + ($case_studies->currentPage() - 1)*$case_studies->perPage() }}</td>
                                <td>{{ $case_study->title }}</td>
                                <td><img src="{{ $case_study->thumbnail_img }}" width="120" alt=""></td>
                                <td>{{ $case_study->brief_description }}</td>
                                <td>{{ date('d-m-Y h:iA',strtotime($case_study->updated_at)) }}</td>
                                <td>
                                    <a href="{{ route('admin.case-studies.edit',encrypt($case_study->id)) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                                    <a href="{{ route('admin.case-studies.delete',encrypt($case_study->id)) }}" class="btn btn-sm btn-danger">{{ __('Delete') }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Thumbnail') }}</th>
                                <th>{{ __('Description') }}</th>
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
                            {{ $case_studies->appends(request()->input())->links() }}
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
