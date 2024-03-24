@extends('layouts.default-layout.master')

@section('title') {{ __('main.How_To_Use') }}
{{ $title }}
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3> {{ __('main.How_To_Use') }}</h3>
        @endslot
        <li class="breadcrumb-item"> {{ __('main.How_To_Use') }}</li>
        @slot('breadcrumb_icon')
            <li>
                <a href="{{route('categoryterms.create')}}" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="plus"></i></a>
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
                                    <th>{{ __('main.Name') }}</th>
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
                "ajax": "{{ route('categoryterms.index') }}",
                "columns": [{data: 'id', name: 'id'},
                    {data: 'content_ar', name: 'content_ar'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},]
            });
        </script>
    @endpush

@endsection
