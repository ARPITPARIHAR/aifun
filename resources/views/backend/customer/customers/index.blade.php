@extends('backend.layouts.app')
@section('meta_title',__('Customers'))

@section('page_name',__('Customers'))

@section('page_description',__('Customers'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Customers') }}</a>
    </li>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <!-- Zero config.table start -->
        <div class="card">
            <div class="card-header row">
                <div class="col-sm-2">
                    <a href="{{ route('admin.customers.create') }}" class="btn btn-sm btn-primary">{{ __('Add Customer') }}</a>
                </div>
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Phone') }}</th>
                                <th>{{ __('Address') }}</th>
                                <th>{{ __('Newsletter') }}</th>
                                <th>{{ __('Updated At') }}</th>
                                <th>{{ __('Updated At') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key=>$user)
                            <tr>
                                <td>{{ ($key+1) + ($users->currentPage() - 1)*$users->perPage() }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->is_newsletter ? 'Yes':'NO' }}</td>
                                <td>
                                    <div class="col-sm-12">
                                        <input type="checkbox" class="js-small f-right"  value="1" onchange="active(this,'{{encrypt($user->id)}}')" @if($user->active) checked="" @endif>
                                    </div>
                                </td>
                                <td>{{ date('d-m-Y h:iA',strtotime($user->updated_at)) }}</td>
                                <td>
                                    <a href="{{ route('admin.customers.edit',encrypt($user->id)) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                                    <a href="{{ route('admin.customers.delete',encrypt($user->id)) }}" class="btn btn-sm btn-danger">{{ __('Delete') }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Phone') }}</th>
                                <th>{{ __('Address') }}</th>
                                <th>{{ __('Newsletter') }}</th>
                                <th>{{ __('Updated At') }}</th>
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
                            {{ $users->appends(request()->input())->links() }}
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
    <script src="{{ asset('backend/plugins/switchery/js/switchery.min.js') }}"></script>
    <script>
        // Multiple swithces
        var elem = Array.prototype.slice.call(document.querySelectorAll('.js-small'));

        elem.forEach(function(html) {
            var switchery = new Switchery(html, {
                color: '#1abc9c',
                jackColor: '#fff',
                size: 'small'
            });
        });
        function active(el,id) {
            var status = 0;
            if (el.checked) {
                status = 1;
            }
             $.post("{{ route('admin.customers.active-deactive') }}", {_token:"{{ csrf_token() }}", id:id,status:status}, function(data){
                if(data == 1){
                    console.log('Active Successfully');
                }
                else{
                   console.log('Inactive Successfully');
                }
            });
        }
    </script>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/plugins/switchery/css/switchery.min.css') }}">
@endsection