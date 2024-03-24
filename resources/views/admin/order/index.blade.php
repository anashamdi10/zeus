@extends('layouts.default-layout.master')

@section('title') {{ __('main.Orders') }}
{{ $title }}
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>{{ __('main.Orders') }} </h3>
        @endslot
        <li class="breadcrumb-item">{{ __('main.Orders') }} </li>
        @slot('breadcrumb_icon')
            <li>
                <a href="{{route('orders.create')}}" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="plus"></i></a>
            </li>
        @endslot
    @endcomponent

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display datatables" id="ajax-data-object">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('main.Order_Number') }}</th>
                                     <th>{{ __('main.Client_Name') }} </th>
                                      <th>{{ __('main.Status') }} </th>
                                    <th>  {{ __('main.Order_Total') }}</th>
                                    <th>  {{ __('main.Payment_Status') }}</th>
                                    <th>{{ __('main.Action') }}</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @push('scripts')
        <script type="text/javascript">
            $('#ajax-data-object').DataTable({
                processing: true,
                serverSide: true,
                "ajax": "{{ route('orders.index') }}",
                "columns": [{data: 'id', name: 'id'},
                    {data: 'order_number', name: 'order_number'},
                    {data: 'user', name: 'user'},
                    {data: 'status', name: 'status'},
                    {data: 'total', name: 'total'},
                    {data: 'paid', name: 'paid'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},]
            });
        </script>
    @endpush

@endsection