@extends('layouts.default-layout.master')

@section('title'){{ __('main.Edit_Slide') }}
Our services
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush
@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3>Our services Edit / {{$info->title_en}} </h3>
@endslot
<li class="breadcrumb-item">Our services </li>
@slot('breadcrumb_icon')
@endslot
@endcomponent

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action={{route('services.update',$info->id)}} method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label pt-0" for="title">Title en </label>
                                            <input class="form-control" value="{{$info->title_en}}" id="title_en" type="text" name="title_en">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label pt-0" for="title_ar">Title ar </label>
                                            <input class="form-control" value="{{$info->title_ar}}" id="title_ar" type="text" name="title_ar">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label pt-0" for="sub_title">pragraph en </label>
                                            <input class="form-control" value="{{$info->pragraph_en}}" id="pragraph_en" type="text" name="pragraph_en">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="col-form-label pt-0" for="pragraph_ar">pragraph ar </label>
                                            <input class="form-control" value="{{$info->pragraph_ar}}" id="pragraph_ar" type="text" name="pragraph_ar">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <img src="{{ asset('uploads/services/' . $info->image) }}" width="80px" height="80px" style="margin-bottom: 10px; " /> <br>
                                    <input id='image' name="image" type="file" class="form-control">
                                </div>




                                @if (count($errors) > 0)
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li class="mb-3">
                                        <div class="alert alert-danger outline">{{ $error }}</div>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif

                                @if(Session::has('success'))
                                <div class="alert alert-success outline">{{Session::get('success')}}</div>
                                @endif

                                <div class="d-flex align-items-center flex-wrap gap-3">
                                    <button type="submit" class="btn btn-primary">{{ __('main.Submit') }}</button>
                                    <a href="{{route('admin.why')}}" class="btn btn-danger">{{ __('main.Cancel') }}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
@endpush


@endsection