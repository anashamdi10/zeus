@extends('layouts.default-layout.master')

@section('title')
NewsLetter
@endsection

@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3>Review </h3>
@endslot
<li class="breadcrumb-item"> Review</li>
@slot('breadcrumb_icon')
<li>
    <a href="{{route('review.create')}}" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="plus"></i></a>
</li>
@endslot
@endcomponent

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">

                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="mb-3">
                        <div class="alert alert-danger outline">{{ $error }}</div>
                    </li>
                    @endforeach
                </ul>


                @if(Session::has('success'))
                <div class="alert alert-success outline">{{Session::get('success')}}</div>
                @endif


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table display datatables" id="ajax-data-object">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>opinion</th>
                                    <th>work</th>
                                    <th>Image</th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>

                                @if(@isset($data) && !@empty($data))
                                @foreach( $data as $idx => $dt)

                                <tr>
                                    <td>{{$idx+1}}</td>
                                    <td>{{$dt->name}}</td>
                                    <td>{{$dt->opinion}}</td>
                                    <td>{{$dt->work}}</td>
                                    <td>
                                        <img src="{{ asset('uploads/review/' . $dt->image) }}" width="75px" height="75px" />
                                    </td>

                                    <td>
                                        <a href="{{ route('review.edit',$dt->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('review.delete',$dt->id) }}" class="btn btn-danger btn-sm">Delete<a>
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



@endsection