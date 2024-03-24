@extends('layouts.default-layout.master')

@section('title') {{ __('main.Create_Order') }}
{{ $title }}
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3> {{ __('main.Create_Order') }}</h3>
        @endslot
        <li class="breadcrumb-item">  {{ __('main.Create_Order') }}</li>
        @slot('breadcrumb_icon')
        @endslot
    @endcomponent

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action={{route('orders.store')}} method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="name_ar">{{ __('main.Order_Number') }} </label>
                        <input class="form-control" id="name_ar" type="text"   name="order_number">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="name_en"> {{ __('main.Client') }}</label>
                        <select name="user_id" id="categories" class="form-control" >
                            <option disabled> {{ __('main.Select_Client') }} </option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="name_en">{{ __('main.Total') }}</label>
                        <input class="form-control" id="name_en" rows="4"  name="total">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="name_en">{{ __('main.Status') }}  </label>
                        <select name="status" id="categories" class="form-control" >
                                <option disabled>  {{ __('main.Select_Status') }}</option>
                                <option value="approve">{{ __('main.Approve') }}</option>
                                <option value="disapprove"> {{ __('main.Disapprove') }} </option>
                                <option value="received">{{ __('main.Received') }}</option>
                                <option value="not_received"> {{ __('main.Not_Received') }}</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th scope="col">{{__('main.Products')}}</th>
                                  <th scope="col">{{__('main.Price')}}</th>
                                  <th scope="col">{{__('main.Serial_Number')}}</th>
                                  <th scope="col">{{__('main.Secret')}}</th>
                                  <th scope="col"></th>
                                </tr>
                              </thead>
                              <tbody id="optionRows">
                                <tr id="optTr">
                                    <td>
                                        <select   name="product_id[]"  class="form-control">
                                            <option >{{ __('main.Select_Product') }}</option>
                                            @foreach($products as $product)
                                            <option value="{{$product->id}}">{{$product->name_ar}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    
                                    <td><input type="text" class="form-control" name="price[]"  required></td>
                                    <td><input type="text" class="form-control" name="serial[]"  required></td>
                                    <td><input type="text" class="form-control" name="secret[]"  required></td>
                                    <td><button type="button" class="remove-tr btn btn-danger btn-sm">{{ __('main.Delete') }}</button></td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                    </div>
                    
                     @if (count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class="mb-3"><div class="alert alert-danger outline">{{$error}}</div></li>
                        @endforeach
                    </ul>
                    @endif
            
                    @if(Session::has('success'))
                    <div class="alert alert-primary outline">{{Session::get('success')}}</div>
                    @endif
                    
                    <div class="d-flex align-items-center flex-wrap gap-3">
                        <button type="button" class="btn btn-secondary" name="add" id="add"><i class="fal fa-plus"></i> {{ __('main.Add') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('main.Submit') }}</button>
                        <a href="{{route('admin.orders')}}" class="btn btn-danger">{{__('main.Cancel')}}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script type="text/javascript">
        $("#add").click(function(){
            $("#optionRows").append(`
                <tr id="optTr">
                    <td>
                        <select   name="product_id[]"  class="form-control">
                            <option >{{ __('main.Select_Product') }} </option>
                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->name_ar}}</option>
                            @endforeach
                        </select>
                    </td>
                    
                    <td><input type="text" class="form-control" name="price[]"  required></td>
                    <td><input type="text" class="form-control" name="serial[]"  required></div></td>
                    <td><input type="text" class="form-control" name="secret[]"  required></div></td>
                    <td><button type="button" class="remove-tr btn btn-danger btn-sm">{{ __('main.Delete') }}</button></td>
                </tr>                                        `
            );
        });

        $(document).on('click', '.remove-tr', function(){
            $(this).closest('#optTr').remove();
        });
    </script>
    @endpush

@endsection