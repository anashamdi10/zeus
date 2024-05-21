@extends('layouts.default-layout.master')



@section('title') {{ __('main.Orders') }}
{{ $title }}
@endsection

@section('content')
<div class="container-fluid">
    @component('components.breadcrumb')
    @slot('breadcrumb_title')
    <h3> Order Information </h3>
    @endslot
    <li class="breadcrumb-item"> {{ __('main.Order_Details') }}</li>
    @endcomponent



    <div class="row mb-4">



        <div class="form-group mb-3 col-4">
            <label class="col-form-label pt-0" for="sub_title"> Product Code </label>
            <input readonly class="form-control" id="sub_title" name="sub_title" value="{{$info->product_code}}">
        </div>
        <div class="form-group mb-3 col-4">
            <label class="col-form-label pt-0" for="sub_title"> Product Name </label>
            <input readonly class="form-control" id="sub_title_ar" name="sub_title_ar" value="{{$info->product_name}}">
        </div>
        <div class="form-group mb-3 col-4">
            <label class="col-form-label pt-0" for="name_en"> Name </label>
            <input readonly class="form-control" id="product_code" name="product_code" value="{{$info->name}}">
        </div>








        <div class="form-group mb-3 col-4">
            <label class="col-form-label pt-0" for="harvest_sessions"> Email </label>
            <input readonly class="form-control" id="harvest_sessions" name="harvest_sessions" type="text" value="{{$info->email}}">
        </div>
        <div class="form-group mb-3 col-4">
            <label class="col-form-label pt-0" for="harvest_sessions"> Mobile </label>
            <input readonly class="form-control" id="harvest_essions_ar" name="harvest_essions_ar" type="text" value="{{$info->mobile}}">
        </div>
        <div class="form-group mb-3 col-4">
            <label class="col-form-label pt-0" for="harvest_sessions"> quantity </label>
            <input readonly class="form-control" id="harvest_essions_ar" name="harvest_essions_ar" type="text" value="{{$info->quantity}}">
        </div>
        <div class="form-group mb-3 col-12">
            <label class="col-form-label pt-0" for="harvest_sessions"> Notes </label>
            <textarea readonly class="form-control"> {{$info->notes}}</textarea>
        </div>
    </div>




</div>



@endsection