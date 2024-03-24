@extends('layouts.default-layout.master')

@section('title'){{ __('main.Edit_Slide') }}
{{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush
@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3>{{ __('main.Edit_Slide') }} </h3>
@endslot
<li class="breadcrumb-item"> {{ __('main.Edit_Slide') }} </li>
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
                            <form action={{route('slides.update',$info->id)}} method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="title">Title </label>
                                    <input class="form-control" value="{{$info->title}}" id="title" type="text" name="title">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="sub_title">Sub Title </label>
                                    <input class="form-control" value="{{$info->sub_title}}" id="sub_title" type="text" name="sub_title">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="link">Link </label>
                                    <input class="form-control" value="{{$info->link}}" id="link" type="text" name="link">
                                </div>
                                <!-- <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="image">{{ __('main.Image') }} </label>
                                    <div> <img src="{{ asset('uploads/slides/' . $info->image) }}" width="75px" height="75px" /></div>
                                    <input class="form-control" id="image" name="image" type="file" >
                                </div> -->

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