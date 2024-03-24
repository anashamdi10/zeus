@extends('layouts.default-layout.master')

@section('title'){{ __('main.Edit_Rabid_Offers') }}
{{ $title }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush
@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3> {{ __('main.Edit_Rabid_Offers') }}</h3>
@endslot
<li class="breadcrumb-item"> {{ __('main.Edit_Rabid_Offers') }}</li>
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
                            <form action={{route('flash.deals.update',$info->id)}} method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                <div class="mb-3">
                                    <label class="col-form-label pt-0" for="name_en"> {{ __('main.Product') }}</label>
                                    <select name="product_id" id="categories" class="form-control">
                                        <option disabled> {{ __('main.Select_Product') }}</option>
                                        @foreach($products as $product)


                                        <option {{($product->id == $info->product_id)?"selected":""}} value="{{ $product->id }}">{{ $product->name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="name_en">Title</label>
                                    <input class="form-control" id="title" name="title" value="{{$info->title}}">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="name_en">pragraph</label>
                                    <input class="form-control" id="pragraph" name="pragraph" value="{{$info->pragraph}}">
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label pt-0" for="name_ar">{{ __('main.Discount') }} </label>
                                    <input class="form-control" id="name_ar" type="text" value="{{$info->sale_price}}" name="sale_price">
                                </div>

                                <div class="row">
                                    <div class="col-6">

                                        <label class="col-form-label pt-0" for="name_ar">Date and time </label>
                                        <input type="datetime-local" id="date_time" name="date_time" value="{{$info->date_time}}">

                                    </div>

                                    <div class="col-6 mb-3">
                                        <label class="col-form-label pt-0">{{ __('main.Status') }} </label>
                                        <label class="d-block" for="flexRadioDefault1">
                                            <input class="radio_animated" id="flexRadioDefault1" type="radio" value="1" {{($info->status == "1")?"checked":""}} name="status" id="flexRadioDefault1">{{ __('main.Active') }}
                                        </label>

                                        <label class="d-block" for="flexRadioDefault2">
                                            <input class="radio_animated" id="flexRadioDefault2" type="radio" value="0" {{($info->status == "0")?"checked":""}} name="status" id="flexRadioDefault2">{{ __('main.Not_Active') }}
                                        </label>
                                    </div>

                                    <label class="col-form-label pt-0" for="main_image"> Main Image </label>
                                    <div><img src="{{ asset('uploads/offers/' . $info->image) }}" width="75px" height="75px" /></div>
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
                                    <a href="{{route('flash.deals.index')}}" class="btn btn-danger">{{ __('main.Cancel') }}</a>
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