@extends('layouts.default-layout.master')

@section('title'){{ __('main.Create_Rabid_Offers') }}
{{ $title }}
@endsection

@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3> {{ __('main.Create_Rabid_Offers') }}</h3>
@endslot
<li class="breadcrumb-item"> {{ __('main.Create_Rabid_Offers') }}</li>
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
                            <form action={{route('flash.deals.store')}} method="post" enctype="multipart/form-data">
                                {{csrf_field()}}

                                <!--<div class="form-group mb-3">-->
                                <!--    <label class="col-form-label pt-0" for="name_en"> {{ __('main.Product') }}</label>-->
                                <!--    <select name="product_id" id="categories" class="form-control" >-->
                                <!--        <option disabled>  {{ __('main.Select_Product') }}</option>-->
                                <!--        @foreach($products as $product)-->
                                <!--            <option value="{{ $product->id }}">{{ $product->name_ar }}</option>-->
                                <!--        @endforeach-->
                                <!--    </select>-->
                                <!--</div>-->





                                <div class="opt-tab" id="productTab">
                                    <label for="product" class="col-form-label">Choose Product </label>
                                    <select class="form-select" name="product_id" id="product">
                                        <option value="" disabled selected>Select Product</option>
                                        @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="name_en">Title</label>
                                    <input class="form-control" id="title" name="title">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="name_en">pragraph</label>
                                    <input class="form-control" id="pragraph" name="pragraph">
                                </div>


                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="name_ar">{{ __('main.Discount') }} </label>
                                    <input class="form-control" id="name_ar" type="text" name="sale_price">
                                </div>

                                <div class="row">

                                    <div class="col-6">

                                        <label class="col-form-label pt-0" for="name_ar">Date and time </label>
                                        <input type="datetime-local" id="date_time" name="date_time">

                                    </div>
                                    <div class="col-6">
                                        <label class="col-form-label pt-0">{{ __('main.Status') }} </label>
                                        <label class="d-block" for="flexRadioDefault1">
                                            <input class="radio_animated" id="flexRadioDefault1" type="radio" value="1" name="status" id="flexRadioDefault1">{{ __('main.Active') }}
                                        </label>

                                        <label class="d-block" for="flexRadioDefault2">
                                            <input class="radio_animated" id="flexRadioDefault2" type="radio" value="0" name="status" id="flexRadioDefault2">{{ __('main.Not_Active') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="col-form-label pt-0" for="main_image"> Main Picture </label>
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
<!-- 
    @push('scripts')
    <script>
        $(".offerRad").on('change', function() {
            $(".offerRad").siblings("label").addClass("btn-light").removeClass("btn-secondary");
             
            let checkedTarget = $(this).attr("data-bs-target");
             
            if($(this).is(':checked')) {
      	        $(this).siblings("label").removeClass("btn-light").addClass("btn-secondary");
      	        $("#optTabs .opt-tab").hide();
                $("#optTabs").find(`#${checkedTarget}`).show();
            }
        })
    </script>
    @endpush -->

@endsection