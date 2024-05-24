@extends('layouts.default-layout.master')

@section('title')Certificates create

@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush

@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3>Certificates Edit </h3>
@endslot
<li class="breadcrumb-item"> Certificates Edit </li>
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
                            <form action={{route('certificates.update',$info->id)}} method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label pt-0" for="title">Title </label>
                                        <input class="form-control" id="title" type="text" name="title" value="{{$info->title}}">
                                    </div>
                                    <div class="col-md-6 mb-3 ">
                                        <label class="col-form-label pt-0" for="title_ar">title ar </label>
                                        <input class="form-control" id="title_ar" type="text" name="title_ar" value="{{$info->title_ar}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" col-md-6 mb-3">
                                        <label class="col-form-label pt-0" for="city">city</label>
                                        <input class="form-control" id="sub_title" type="text" name="city" value="{{$info->city}}">
                                    </div>
                                    <div class="col-md-6 mb-3 ">
                                        <label class="col-form-label pt-0" for="title_ar">city_ar</label>
                                        <input class="form-control" id="city_ar" type="text" name="city_ar" value="{{$info->city_ar}}">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="sub_title">image </label>
                                    <img src="{{ asset('uploads/certificates/' . $info->image) }}" width="80px" height="80px" style="margin-bottom: 10px; " /> <br>

                                    <input class="form-control" id="image" name="image" type="file">
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
                                    <a href="{{route('admin.slides')}}" class="btn btn-danger">{{ __('main.Cancel') }}</a>
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