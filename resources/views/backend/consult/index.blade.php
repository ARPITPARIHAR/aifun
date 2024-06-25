@extends('backend.layouts.app')

@section('meta_title', __('Consult'))

@section('page_name', __('Consult'))

@section('page_description', __('List of Consults'))

@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Contacts') }}</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="contact-table" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Phone') }}</th>
                                <th>{{ __('Email') }}</th>

                                <th>{{ __('Address') }}</th>
                                <th>{{ __('Text') }}</th>
                                <th>{{ __('Actions') }}</th> <!-- Added Actions column -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($consults as $key => $consult)
                            <tr>
                                <td>{{ $consult->id }}</td>
                                <td>{{ $consult->name }}</td>
                                <td>{{ $consult->number }}</td> <!-- Corrected variable name -->
                                <td>{{ $consult->email }}</td>
                               <!-- Assuming 'message' is the field name -->
                                <td>{{ $consult->address }}</td>
                                <td>{{ $consult->text }}</td>
                                <td>
                                    <form action="{{ route('admin.consult.delete', encrypt($consult->id)) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this consultant?')">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Phone') }}</th>
                                <th>{{ __('Email') }}</th>
                              
                                <th>{{ __('Address') }}</th>
                                <th>{{ __('Text') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-5">
                        <div class="dataTables_info" id="contact-table_info" role="status" aria-live="polite">
                            Showing {{ $consults->firstItem() }} to {{ $consults->lastItem() }} of {{ $consults->total() }} entries
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <div class="float-sm-right">
                            {{ $consults->appends(request()->input())->links() }}
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
<script>
    // Any additional scripts can be added here
</script>
@endsection

@section('styles')
<style>
    /* Any additional styles can be added here */
</style>
@endsection
