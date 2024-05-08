@extends('layouts.default-layout.master')

@section('title'){{ __('main.Edit_Product') }} -
{{ $settings->name_ar }}
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
@endpush
@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3> {{ __('main.Edit_Product') }} </h3>
@endslot
<li class="breadcrumb-item"> {{ __('main.Edit_Product') }}</li>
@slot('breadcrumb_icon')
@endslot
@endcomponent

<input type="hidden" id="token_search" value="{{csrf_token() }}">
<input type="hidden" id="ajax_subcategory" value="{{ route('admin.sub_category') }}">

<div class="container-fluid">
    <form action={{route('products.update',$info->id)}} method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="row">

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="col-form-label pt-0" for="name_en">{{ __('main.Name_En') }}</label>
                            <input class="form-control" id="name_en" value="{{$info->name_en}}" name="name_en">
                        </div>

                        <div class="form-group mb-3 ibox-content no-padding">
                            <label class="col-form-label pt-0" for="name_en"> {{ __('main.Desc_En') }}</label>
                            <textarea class="ckeditor form-control" rows="3" name="description_en">
                            {{$info->description_en}}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="col-form-label pt-0" for="name_en">Product Name Ar</label>
                            <input class="form-control" id="name_ar" name="name_ar" value="{{$info->name_ar}}">
                        </div>

                        <div class="form-group mb-3 ibox-content no-padding">
                            <label class="col-form-label pt-0" for="name_ar"> Description Product Ar </label>
                            <textarea class="ckeditor form-control" rows="4" name="description_ar">
                            {{$info->description_ar}}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <!-- <div class="row mb-4"> -->


                <!-- <div class="form-group mb-3 col-4">
                        <label class="col-form-label pt-0" for="name_en">{{ __('main.Code') }}</label>
                        <input class="form-control" id="name_en" value="{{$info->product_code}}" name="product_code" value="{{$info->product_code}}">
                    </div> -->

                <!-- <div class="form-group mb-3 col-4">
                                <label class="col-form-label pt-0" for="name_en">{{ __('main.Quantity') }}</label>
                                <input class="form-control" id="name_en" rows="4"  name="quantity" value="{{$info->quantity}}">
                            </div>
                            
                            <div class="form-group mb-3 col-4">
                                <label class="col-form-label pt-0" for="name_en">{{ __('main.Point') }}</label>
                                <input class="form-control" id="name_en" rows="4" type="number"  name="point" value="{{$info->point}}">
                            </div> -->
                <!-- </div> -->

                <!-- 
                <div class="row mb-4">
                    <h5 class="mb-4">سعر المنتج</h5>

                    <div class="form-group mb-3 col-4">
                        <label class="col-form-label pt-0" for="name_en">{{ __('main.Shipping_Cost') }}</label>
                        <input class="form-control" id="name_en" type="number" Min="0" Step="any" name="pos_price" value="{{$info->pos_price}}">
                    </div>

                    <div class="form-group mb-3 col-4">
                        <label class="col-form-label pt-0" for="name_en"> {{ __('main.Selling_Price') }}</label>
                        <input class="form-control" id="name_en" rows="4" type="number" Min="0" Step="any" name="price" value="{{$info->price}}">
                    </div>

                    <div class="form-group mb-3 col-4">
                        <label class="col-form-label pt-0" for="name_en">{{ __('main.Discount_Price') }}</label>
                        <input class="form-control" id="name_en" type="number" Min="0" Step="any" name="sale_price" value="{{$info->sale_price}}">
                    </div>
                </div> -->

                <div class="row mb-4">
                    <h5 class="mb-4">Main Information </h5>

                    <!-- <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="name_en">{{ __('main.Brand') }}</label>
                        <select name="brand_id" id="categories" class="form-control">
                            <option disabled> {{ __('main.Select_Brand') }}</option>
                            @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" {{($brand->id == $info->brand_id)?"selected":""}}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div> -->
                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="sub_title"> Sub Title </label>
                        <input class="form-control" id="sub_title" name="sub_title" value="{{$info->sub_title}}">
                    </div>
                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="sub_title"> Sub Title Ar </label>
                        <input class="form-control" id="sub_title_ar" name="sub_title_ar" value="{{$info->sub_title_ar}}">
                    </div>
                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="name_en"> Product Code </label>
                        <input class="form-control" id="product_code" name="product_code" value="{{$info->product_code}}">
                    </div>



                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="name_en"> {{ __('main.Category') }}</label>
                        <select name="category_id" id="category_id" class="form-control ">

                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{$info->category_id == $category->id ? 'selected': ''}}>{{ $category->name_en }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3 col-3" id='category_term'>
                        <label class="col-form-label pt-0" for="name_en"> Sub Category</label>
                        <select name="category_term" id="category_term" class="form-control ">
                            <option disabled> اختر القسم</option>
                            @foreach($categoryterms as $categoryterm)
                            <option {{$info->category_term == $categoryterm->id ? 'selected': ''}} value="{{ $categoryterm->id }}">{{ $categoryterm->content_en }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="name_en"> {{ __('main.Featured') }}</label>
                        <select name="featured" id="featured" class="form-control">
                            <option value="1" {{( $info->featured==1)?"selected":""}}> {{ __('main.Yes') }} </option>
                            <option value="0" {{( $info->featured==0)?"selected":""}}> {{ __('main.No') }} </option>
                        </select>
                    </div>

                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="harvest_sessions"> harvest Sessions </label>
                        <input class="form-control" id="harvest_sessions" name="harvest_sessions" type="text" value="{{$info->harvest_sessions}}">
                    </div>
                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="harvest_sessions"> harvest Sessions ar </label>
                        <input class="form-control" id="harvest_essions_ar" name="harvest_essions_ar" type="text" value="{{$info->harvest_essions_ar}}">
                    </div>
                </div>

                <h5 class="mb-4">Product Image</h5>
                <div class="row mb-4">
                    <div class="form-group mb-3 col-md-6">
                        <label class="col-form-label pt-0" for="main_image"> Main Image </label>
                        <div><img src="{{ asset('uploads/products/' . $main_image) }}" width="75px" height="75px" /></div>
                        <input class="form-control" id="main_full" name="main_full" type="file">
                    </div>
                    <div class="form-group mb-3 col-md-6">
                        <label class="col-form-label pt-0" for="sub_main"> Sub Image </label>
                        <div><img src="{{ asset('uploads/products/' . $sub_image) }}" width="75px" height="75px" /></div>
                        <input class="form-control" id="sub_main" name="sub_main" type="file">
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-form-label pt-0" for="main_image"> Product Images </label>
                        <br>
                        <div class="row">
                            @foreach( $images as $image)
                            <div class="col-2">
                                <img src="{{ asset('uploads/products/' . $image->full) }}" width="80px" height="80px" style="margin-bottom: 10px; " /> <br>
                                <a href="{{ route('product_images.delete', $image->full) }}" class="btn btn-danger btn-sm" style="margin-bottom: 10px; ">delete</a>
                            </div>
                            @endforeach
                        </div>

                        <input class="form-control" id="images" name="images[]" multiple accept="image/*" type="file">
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="mb-0">Options</h5>
                        </div>

                        <div class="col-lg-6">
                            <!-- Bookmark Start-->
                            <div class="bookmark">
                                <ul>
                                    <li class="p-0">
                                        <a role="button" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables" onClick="addOption({{$options}})">
                                            <i data-feather="plus"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Bookmark Ends-->
                        </div>
                    </div>
                </div>

                <div id="form"></div>

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
                    <a href="{{route('admin.products')}}" class="btn btn-danger">{{ __('main.Cancel') }}</a>
                </div>
            </div>
        </div>
    </form>
</div>


@push('scripts')
<script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>

<script>
    $(document).ready(function() {
        $(document).on('change', '#category_id', function(e) {
            var token = $("#token_search").val();
            var url = $("#ajax_subcategory").val();
            var category_id = $("#category_id").val();

            jQuery.ajax({
                url: url,
                type: "post",
                dataType: "html",
                cache: false,
                data: {
                    '_token': token,
                    category_id: category_id,

                },
                success: function(data) {
                    $("#category_term").html(data);
                },
                error: function() {
                    alert("error in add_item");
                },
            });
        })
    })
</script>

@endpush


@endsection