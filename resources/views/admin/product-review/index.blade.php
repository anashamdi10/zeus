@extends('layouts.default-layout.master')

@section('title') {{ __('main.Reviews') }}
{{ $title }}
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>{{ __('main.Reviews') }} </h3>
        @endslot
        <li class="breadcrumb-item">{{ __('main.Reviews') }} </li>
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
                                    <th>{{ __('main.Product_Name') }}  </th>
                                     <th>{{ __('main.Client_Name') }}  </th>
                                      <th>{{ __('main.Review') }} </th>
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
                "ajax": "{{ route('product.reviews.index') }}",
                "columns": [{data: 'id', name: 'id'},
                    {data: 'product', name: 'product'},
                    {data: 'user', name: 'user'},
                    {data: 'rate', name: 'rate'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},]
            });
        </script>
    @endpush

@endsection