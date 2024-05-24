@extends('layouts.default-layout.master')

@section('title')
why shoose us
{{ $title }}
@endsection

@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3>why shoose us </h3>
@endslot
<li class="breadcrumb-item"> why shoose us</li>

@endcomponent

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table display datatables" id="ajax-data-object">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th style="width: 300px;">pragraph</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if(@isset($data) && !@empty($data))
                                @foreach( $data as $info)

                                <tr>
                                    <td>{{$info->id}}</td>
                                    <td>{{$info->title}}</td>
                                    <td>{{$info->pragraph_en}}</td>



                                    <td>
                                        <a href="{{ route('why.edit', $info->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5" class="alert alert-danger">No Data</td>
                                </tr>

                                @endif
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>



</div>
</div>





@endsection