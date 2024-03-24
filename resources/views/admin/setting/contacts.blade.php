@extends('layouts.default-layout.master')

@section('title') {{ __('main.Contacts') }}
{{ $title }}
@endsection

@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3>{{ __('main.Contacts') }} </h3>
@endslot
<li class="breadcrumb-item">{{ __('main.Contacts') }} </li>

@endcomponent

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class= " table display datatables" id="ajax-data-object">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('main.Name') }}</th>
                                    <th>{{ __('main.Message') }} </th>
                                    <th>{{ __('main.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $data as $idx => $info)
                                
                                <tr>
                                    <td>{{ $idx +1 }}</td>
                                    <td>{{ $info->name }}</td>
                                    <td>{{ $info->message }}</td>
                                    <td>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection