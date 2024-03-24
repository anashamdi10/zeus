@extends('layouts.default-layout.master')

@section('title'){{ __('main.Roles') }}
{{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>{{ __('main.Roles') }}</h3>
        @endslot
        <li class="breadcrumb-item">{{ __('main.Roles') }}</li>
        @slot('breadcrumb_icon')
            <li>
                <a href="{{route('roles.create')}}" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="plus"></i></a>
            </li>
        @endslot
    @endcomponent

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class=" ">
                            <table class="display datatables table-responsive table" id="ajax-data-object">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('main.Name') }}</th>
                                    <th>{{ __('main.Action') }}</th>
                                </tr>
                                </thead>
                                <tfoot>
                                @foreach($roles as $role)
                                <tr>
                                    <th>{{ ++$i }}</th>
                                    <th>{{ $role->name }}</th>
                                    <th>
                                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                    </th>
                                </tr>
                                @endforeach
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @push('scripts')
        <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>

    @endpush

@endsection