@extends('layouts.default-layout.master')

@section('title')إضافة منتج
{{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">

@endpush

@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3> Add Product </h3>
@endslot
<li class="breadcrumb-item"> Add Product</li>
@slot('breadcrumb_icon')
@endslot
@endcomponent

<div class="container-fluid">
    <form action={{route('products.store')}} method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="col-form-label pt-0" for="name_en">Product Name</label>
                            <input class="form-control" id="name_en" name="name_en">
                        </div>

                        <div class="form-group mb-3 ibox-content no-padding">
                            <label class="col-form-label pt-0" for="name_en"> Description Product </label>
                            <textarea class="ckeditor form-control" rows="4" name="description_en">
                            {{old('description')}}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">


                <div class="row mb-4">
                    <h5 class="mb-4">Main Information</h5>
                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="name_en"> product Code </label>
                        <input class="form-control" id="product_code" name="product_code">
                    </div>

                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="name_en"> Category</label>
                        <select name="category_id" id="category_id" class="form-control ">
                            <option disabled> اختر القسم</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name_en }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="name_en"> Special</label>
                        <select name="featured" id="featured" class="form-control">
                            <option value="" disabled selected> Choose</option>
                            <option value="1"> Yes </option>
                            <option value="0"> Noا </option>
                        </select>
                    </div>
                    <!-- <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="name_en"> متاح</label>
                        <select name="available" id="categories" class="form-control">
                            <option value="" disabled selected> اختر</option>
                            <option value="1"> نعم </option>
                            <option value="0"> لا </option>
                        </select>
                    </div> -->
                </div>

                <h5 class="mb-4"> Product Pictures</h5>
                <div class="row mb-4">
                    <div class="form-group mb-3">
                        <label class="col-form-label pt-0" for="main_image"> Main Picture </label>
                        <input class="form-control" id="main_full" name="main_full" type="file">
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label pt-0" for="main_image"> Product Pictures </label>
                        <input class="form-control" id="images" name="images[]" multiple accept="image/*" type="file">
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
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{route('admin.products')}}" class="btn btn-danger">{{ __('main.Cancel') }}</a>
            </div>
        </div>
</div>
</form>
</div>

@push('scripts')
<script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
@endpush

@endsection