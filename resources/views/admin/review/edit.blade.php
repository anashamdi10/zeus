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
                            <form action={{route('review.update',$info->id)}} method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="title">Name </label>
                                    <input class="form-control" id="name" type="text" value="{{$info->name}}" name="name">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="sub_title">Opinion </label>
                                    <input class="form-control" id="opinion" value="{{$info->opinion}}" type="text" name="opinion">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="sub_title">Work </label>
                                    <input class="form-control" id="Opinion" value="{{$info->work}}" type="work" name="work">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="image">{{ __('main.Image') }} </label>
                                    <input class="form-control" id="image" name="image" type="file">
                                </div>
                                <div class="form-group mb-3">
                                    <img src="{{ asset('uploads/review/' . $info->image) }}" width="75px" height="75px" />
                                </div>




                                <div class="d-flex align-items-center flex-wrap gap-3">
                                    <button type="submit" class="btn btn-primary">{{ __('main.Submit') }}</button>
                                    <a href="{{route('admin.review')}}" class="btn btn-danger">{{ __('main.Cancel') }}</a>
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