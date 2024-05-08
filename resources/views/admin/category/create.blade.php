@extends('layouts.default-layout.master')

@section('title'){{ __('main.Create_New_Category') }}
{{ $title }}
@endsection

@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3>{{ __('main.Create_New_Category') }} </h3>
@endslot
<li class="breadcrumb-item">{{ __('main.Create_New_Category') }} </li>
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
                            <form action={{route('categories.store')}} method="post" enctype="multipart/form-data">
                                {{csrf_field()}}


                                <div class="row">

                                    <div class="col-6">
                                        <div class="form-group mb-3 ibox-content no-padding">
                                            <label class="col-form-label pt-0" for="name_en"> Catrgory En</label>
                                            <input class="form-control" type="text" value="{{old('name_en')}}" name="name_en">

                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group mb-3 ibox-content no-padding">
                                            <label class="col-form-label pt-0" for="name_en"> Category Ar</label>

                                            <input class="form-control" type="text" value="{{old('name_ar')}}" name="name_ar">
                                        </div>
                                    </div>
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