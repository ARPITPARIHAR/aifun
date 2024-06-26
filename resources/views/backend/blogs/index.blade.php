@extends('backend.layouts.app')
@section('meta_title',__('Blogs'))

@section('page_name',__('Blogs'))

@section('page_description',__('Blogs'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Blogs') }}</a>
    </li>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <!-- Zero config.table start -->
        <div class="card">
            <div class="card-header row">
                <div class="col-sm-2">
                    <a href="{{ route('admin.blogs.create') }}" class="btn btn-sm btn-primary">{{ __('Add Blog') }}</a>
                </div>
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>#</th>

                                <th>{{ __('Image') }}</th>
                                <th>{{ __('Brief Description') }}</th>
                                <th>{{ __('Updated At') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $key=>$blog)
                            <tr>
                                <td>{{ ($key+1) + ($blogs->currentPage() - 1)*$blogs->perPage() }}</td>

                                <td><img src="{{ asset($blog->image) }}" width="150"></td>
                                <td>{{ $blog->brief_description }}</td>
                                <td>{{ date('d-m-Y h:iA',strtotime($blog->updated_at)) }}</td>
                                <td>
                                    <a href="{{ route('admin.blogs.edit',encrypt($blog->id)) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                                    <a href="{{ route('admin.blogs.delete',encrypt($blog->id)) }}" class="btn btn-sm btn-danger">{{ __('Delete') }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>

                                <th>{{ __('Image') }}</th>
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
                            {{ $blogs->appends(request()->input())->links() }}
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
