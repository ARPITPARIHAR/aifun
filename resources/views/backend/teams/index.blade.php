@extends('backend.layouts.app')
@section('meta_title',__('Teams'))

@section('page_name',__('Teams'))

@section('page_description',__('Teams'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Teams') }}</a>
    </li>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <!-- Zero config.table start -->
        <div class="card">
            <div class="card-header row">
                <div class="col-sm-2">
                    <a href="{{ route('admin.teams.create') }}" class="btn btn-sm btn-primary">{{ __('Add Team Member') }}</a>
                </div>
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Thumbnail') }}</th>
                                <th>{{ __('Designation') }}</th>
                                <th>{{ __('Brief Description') }}</th>
                                <th>{{ __('Updated At') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $key=>$team)
                            <tr>
                                <td>{{ ($key+1) + ($teams->currentPage() - 1)*$teams->perPage() }}</td>
                                <td>{{ $team->name }}</td>
                                <td><img src="{{ asset($team->thumbnail_img) }}" width="90"></td>
                                <td>{{ $team->designation }}</td>
                                <td>{{ $team->brief_description }}</td>
                                <td>{{ date('d-m-Y h:iA',strtotime($team->updated_at)) }}</td>
                                <td>
                                    <a href="{{ route('admin.teams.edit',encrypt($team->id)) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                                    <a href="{{ route('admin.teams.delete',encrypt($team->id)) }}" class="btn btn-sm btn-danger">{{ __('Delete') }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Thumbnail') }}</th>
                                <th>{{ __('Designation') }}</th>
                                <th>{{ __('Brief Description') }}</th>
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
                            {{ $teams->appends(request()->input())->links() }}
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
