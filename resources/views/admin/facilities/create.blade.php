@extends('layouts.default-layout.master')

@section('title')Facilities create
{{ $title }}
@endsection

@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3>Facilities create</h3>
@endslot
<li class="breadcrumb-item">Facilities create </li>
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
                            <form action={{route('facilities.store')}} method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="row">

                                    <div class="col-6">
                                        <div class="form-group mb-3 ibox-content no-padding">
                                            <label class="col-form-label pt-0" for="name_en"> Title En</label>
                                            <input class="form-control" type="text" name="title">

                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group mb-3 ibox-content no-padding">
                                            <label class="col-form-label pt-0" for="title_ar"> Title Ar</label>

                                            <input class="form-control" type="text" name="title_ar">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-6">
                                        <div class="form-group mb-3 ibox-content no-padding">
                                            <label class="col-form-label pt-0" for="pragraph"> pragraph En</label>
                                            <textarea class=" form-control" rows="4" name="pragraph">

                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group mb-3 ibox-content no-padding">
                                            <label class="col-form-label pt-0" for="name_en"> pragraph Ar</label>

                                            <textarea class=" form-control" rows="4" name="pragraph_ar"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label pt-0" for="main_image"> Image </label>
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
                                    <a href="{{route('category_terms')}}" class="btn btn-danger">{{ __('main.Cancel') }}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection