@extends('layouts.default-layout.master')

@section('title'){{ __('main.Slides') }}
Our News
@endsection

@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3>Our News </h3>
@endslot
<li class="breadcrumb-item"> Our News</li>
@slot('breadcrumb_icon')
<li>
    <a href="{{route('news.create')}}" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="plus"></i></a>

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
                                    <th>Writer</th>
                                    <th>Title</th>
                                    <th style="width: 300px;">pragraph</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if(@isset($data) && !@empty($data))
                                @foreach( $data as $index => $info)

                                <tr>
                                    <td>{{$index +1 }}</td>
                                    <td>{{$info->writer_en}}</td>
                                    <td>{{$info->title_en}}</td>
                                    <td>{{$info->pragraph_en}}</td>



                                    <td>
                                        <a href="{{ route('news.edit', $info->id) }}" class="btn btn-primary btn-sm">Edit</a>
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
        @if(Session::has('success'))
        <div class="alert alert-success outline">{{Session::get('success')}}</div>
        @endif
    </div>



</div>
</div>





@endsection