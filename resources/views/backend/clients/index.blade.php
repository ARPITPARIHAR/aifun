@extends('backend.layouts.app')
@section('meta_title',__('Clients'))

@section('page_name',__('Clients'))

@section('page_description',__('Clients'))
@section('name')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}"> <i class="feather icon-home"></i> </a>
    </li>
    <li class="breadcrumb-item"><a href="#!">{{ __('Clients') }}</a>
    </li>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <!-- Zero config.table start -->
        <div class="card">
            <div class="card-header row">
                <div class="col-sm-2">
                    <a href="{{ route('admin.clients.create') }}" class="btn btn-sm btn-primary">{{ __('Add Client') }}</a>
                </div>
            </div>
            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Practice') }}</th>
                                <th>{{ __('Logo') }}</th>
                                 <th>{{ __('Featured') }}</th>
                                <th>{{ __('URL') }}</th>
                                <th>{{ __('Updated At') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $key=>$client)
                            <tr>
                                <td>{{ ($key+1) + ($clients->currentPage() - 1)*$clients->perPage() }}</td>
                                <td>{{ $client->name }}</td>
                                <td>{{ optional($client->practice)->title }}</td>
                                <td><img src="{{ asset($client->logo) }}" width="90"></td>
                                <td>
                                    <div class="col-sm-12">
                                        <input type="checkbox" class="js-small f-right"  value="1" onchange="featured(this,'{{encrypt($client->id)}}')" @if($client->featured) checked="" @endif>
                                    </div>
                                </td>
                                <td>{{ $client->url }}</td>
                                <td>{{ date('d-m-Y h:iA',strtotime($client->updated_at)) }}</td>
                                <td>
                                    <a href="{{ route('admin.clients.edit',encrypt($client->id)) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                                    <a href="{{ route('admin.clients.delete',encrypt($client->id)) }}" class="btn btn-sm btn-danger">{{ __('Delete') }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Logo') }}</th>
                                <th>{{ __('URL') }}</th>
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
                            {{ $clients->appends(request()->input())->links() }}
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
        function featured(el,id) {
            var status = 0;
            if (el.checked) {
                status = 1;
            }
             $.post("{{ route('admin.clients.featured') }}", {_token:"{{ csrf_token() }}", id:id,status:status}, function(data){
                if(data == 1){
                    console.log('Featured Successfully');
                }
                else{
                   console.log('Unfeatured Successfully');
                }
            });
        }
    </script>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('backend/plugins/switchery/css/switchery.min.css') }}">
@endsection
