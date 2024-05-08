@extends('layouts.default-layout.master')

@section('title')
Sub Category
@endsection

@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3> Sub Category </h3>
@endslot
<li class="breadcrumb-item"> Sub Category </li>
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
                            <form action={{route('categoryterms.store')}} method="post" enctype="multipart/form-data">
                                {{csrf_field()}}

                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="name_en">{{ __('main.Category') }} </label>
                                    <select name="category_id" id="categories" class="form-control">
                                        <option disabled value=""> {{ __('main.Select_Category') }} </option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="row">

                                    <div class="col-6">
                                        <div class="form-group mb-3 ibox-content no-padding">
                                            <label class="col-form-label pt-0" for="name_en"> {{ __('main.Content_En') }}</label>
                                            <input class="form-control" type="text" value="{{old('content_en')}}" name="content_en">

                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group mb-3 ibox-content no-padding">
                                            <label class="col-form-label pt-0" for="name_en"> {{ __('main.Content_Ar') }}</label>


                                            <input class="form-control" type="text" value="{{old('content_ar')}}" name="content_ar">
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