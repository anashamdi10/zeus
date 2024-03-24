@extends('layouts.default-layout.master')

@section('title'){{ __('main.Admins') }}
{{ $title }}
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>{{ __('main.Admins') }}</h3>
        @endslot
        <li class="breadcrumb-item">{{ __('main.Admins') }}</li>
       
    @endcomponent

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datatables table-borderless align-middle" id="ajax-data-object">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('main.Name') }}</th>
                                    <th>{{ __('main.Action') }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
            </div>
        </div>
    </div>



    @push('scripts')
        <script type="text/javascript">
            $('#ajax-data-object').DataTable({
                processing: true,
                serverSide: true,
                "ajax": "{{ route('admins.index') }}",
                "columns": [{data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},]
            });
        </script>
    @endpush

@endsection