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
                        <label class="col-form-label pt-0" for="name_en"> Product Code </label>
                        <input class="form-control" id="product_code" name="product_code" value="{{$info->product_code}}">
                    </div>

                    <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="name_en"> {{ __('main.Category') }}</label>
                        <select name="category_id" id="category_id" class="form-control ">

                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{$info->category_id == $category->id ? 'selected': ''}}>{{ $category->name_ar }}</option>
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

                    <!-- <div class="form-group mb-3 col-3">
                        <label class="col-form-label pt-0" for="name_en"> {{ __('main.Available') }}</label>
                        <select name="available" id="categories" class="form-control">
                            <option value="1" {{( $info->available==1)?"selected":""}}> {{ __('main.Yes') }} </option>
                            <option value="0" {{( $info->available==0)?"selected":""}}> {{ __('main.No') }} </option>
                        </select>
                    </div> -->
                </div>

                <h5 class="mb-4">Product Image</h5>
                <div class="row mb-4">
                    <div class="form-group mb-3">
                        <label class="col-form-label pt-0" for="main_image"> Main Image </label>
                        <div><img src="{{ asset('uploads/products/' . $main_image) }}" width="75px" height="75px" /></div>
                        <input class="form-control" id="main_full" name="main_full" type="file">
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

                        <input class="form-control" id="images" name="images[]" multiple accept="image/*" type="file" style="">
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
    function addOption(cats) {
        var catsOtps = cats.map(
                (categ) => `
                        <option value="${categ.id}">${categ.name_ar}</option>
                        `
            )
            .join("");

        html = ` 
                    <div class="card" id="optsCard">
                        <div class="card-header bg-primary text-white">
                            
                                <div class="form-group mb-0">
                                    <label class="col-form-label pt-0" for="name_ar">اختر الخيار</label> 
                                    <div class="col-lg-6 d-flex align-items-end gap-4">    
                                        <select type="text" class="form-control w-50" id="option-field">
                                            ${catsOtps}
                                        </select>
                                        <button type="button" onClick="addnew(this)" class="remove-tr btn btn-danger">اضافه قيمه الخيار</button>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="card-body" id="option_values">

                        </div>
                    </div>
                `;
        $("#form").append(html);
    }


    function addnew(btn) {
        let id = $(btn).siblings('#option-field').find(':selected').val();
        let name = $(btn).siblings('#option-field').find(':selected').text()
        let values = $(btn).closest("#optsCard").find('#option_values');
        console.log(name)
        $.ajax({
            url: `{{ url('/cpadmin/ajax/get-options/') }}/${id}`,
            method: "GET",
            success: function(data) {
                let selectOpts = data.map((opt) => `
                        <option value="${opt.id}">${opt.name_ar}</option>
                    `);
                html = `
                        <div class="" id="option_values">
                            <div class="row mb-4" style="border-bottom: 1px solid #e6edef">
                                <div class="col-lg-1 mb-4">
                                    <div class="form-group mb-0">
                                        <label class="col-form-label pt-0" for="name_ar">${name}</label> 
                                        <select type="text" class="form-control" name="option_value_ids[]">
                                            ${selectOpts}
                                        </select>
                                    </div>
                                </div>
        
                                <div class="col-lg-1 mb-4">
                                    <div class="form-group mb-0">
                                        <label class="col-form-label pt-0" for="name_ar">الكميه</label> 
                                        <input type="text" class="form-control" name="quantities[]">
                                    </div>
                                </div>
                                
                                <input hidden value="${id}" name="option_ids[]">
                            
                                <div class="col-lg-1 mb-4">
                                    <div class="form-group mb-0">
                                        <label class="col-form-label pt-0" for="name_ar">  subtract </label> 
                                        <select type="text" class="form-control" name="subtract[]">
                                            <option value="1">true</option>
                                            <option value="0">false</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-lg-2 mb-4">
                                    <div class="form-group mb-0">
                                        <label class="col-form-label pt-0" for="name_ar">  السعر </label> 
                                        <input type="text" class="form-control" name="prices[]">
                                    </div>
                                </div>
                                
                                <div class="col-lg-1 mb-4">
                                    <div class="form-group mb-0">
                                        <label class="col-form-label pt-0" for="name_ar">price prefix</label> 
                                        <select type="text" class="form-control" name="price_prefixes[]">
                                            <option value="+">plus</option>
                                            <option value="-">minus</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-lg-2 mb-4">
                                    <div class="form-group mb-0">
                                        <label class="col-form-label pt-0" for="name_ar">  النقاط </label> 
                                        <input type="text" class="form-control" name="points[]">
                                    </div>
                                </div>
                                
                                <div class="col-lg-1 mb-4">
                                    <div class="form-group mb-0">
                                        <label class="col-form-label pt-0" for="name_ar">  points prefix </label> 
                                        <select type="text" class="form-control" name="points_prefixes[]">
                                            <option value="+">plus</option>
                                            <option value="-">minus</option>
                                        </select>
                                    </div>
                                </div>
                                        
                                <div class="col-lg-2 mb-4">
                                    <div class="form-group mb-0">
                                        <label class="col-form-label pt-0" for="name_ar">  الوزن </label> 
                                        <input type="text" class="form-control" name="weights[]">
                                    </div>
                                </div>
                                
                                <div class="col-lg-1 mb-4">
                                    <div class="form-group mb-0">
                                        <label class="col-form-label pt-0" for="name_ar">weight prefix</label> 
                                        <select type="text" class="form-control" name="weight_prefixes[]">
                                            <option value="+">plus</option>
                                            <option value="-">minus</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                $(values).append(html);
            }

        });

    }
</script>


@endpush


@endsection