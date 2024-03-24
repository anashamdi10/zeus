@extends('layouts.default-layout.master')

@section('title'){{ __('main.Create_Slide') }}
{{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush

@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3>{{ __('main.Create_Slide') }} </h3>
@endslot
<li class="breadcrumb-item"> {{ __('main.Create_Slide') }} </li>
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
                            <form action={{route('review.store')}} method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="title">Name </label>
                                    <input class="form-control" id="name" type="text" name="name">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="sub_title">Opinion </label>
                                    <input class="form-control" id="opinion" type="text" name="opinion">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="sub_title">Work </label>
                                    <input class="form-control" id="Opinion" type="work" name="work">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="image">{{ __('main.Image') }} </label>
                                    <input class="form-control" id="image" name="image" type="file">
                                </div>

                                

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