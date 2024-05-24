@extends('layouts.default-layout.master')

@section('title')
Facilities
{{ $title }}
@endsection

@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3>Facilities </h3>
@endslot
<li class="breadcrumb-item"> Facilities</li>
@slot('breadcrumb_icon')
<li>
    <a href="{{route('facilities.create')}}" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="plus"></i></a>

</li>
@endslot
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

                                    <td>{{$info->pragraph}}</td>



                                    <td>
                                        <a href="{{ route('facilities.edit', $info->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('news.delete',$info->id) }}" class="btn btn-danger btn-sm">Delete</a>
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