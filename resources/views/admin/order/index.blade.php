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
<!-- <li>
                <a href="{{route('orders.create')}}" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="plus"></i></a>
            </li> -->
@endslot
@endcomponent

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table display datatables" id="ajax-data-object">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name </th>
                                    <th>product name</th>
                                    <th>Email</th>
                                    <th>{{ __('main.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $index=>$info)
                                <tr>
                                    <td>{{$index +1 }}</td>
                                    <td>{{$info->name}}</td>
                                    <td>{{$info->product_name}}</td>
                                    <td>{{$info->email}}</td>
                                    <td>
                                        <a href="{{ route('orders.info',$info->id) }}" class="btn btn-primary btn-sm">info</a>
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