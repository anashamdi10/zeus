@extends('layouts.default-layout.master')

@section('title') {{ __('main.Payment_Methods') }}
{{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush
@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3> {{ __('main.Payment_Methods') }}  </h3>
        @endslot
        <li class="breadcrumb-item">   {{ __('main.Payment_Methods') }}</li>
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
                                <form action="{{route('setting.update.payment',$info->id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    
                                    
                                    <div class="form-group mb-3">
                                        <label class="col-form-label pt-0" for="name_ar"> {{ __('main.payment_Name') }}</label>
                                        <input class="form-control" id="name_ar" type="text" value="{{$info->payment_name}}"   name="payment_name">
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <label class="col-form-label pt-0" for="name_en">{{ __('main.Available') }} </label>
                                        <select class="form-control" id="name_en" name="available">
                                            
                                            <option value="" disapled >Select Type..</option>
                                            <option {{($info->available == "1")?"selected":""}} value="1" >yes</option>
                                            <option {{($info->available == "0")?"selected":""}} value="0" >no</option>
                                        </select> 
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="col-form-label pt-0" for="name_en">{{ __('main.Image') }} </label>
                                        <input class="form-control" id="name_en" type="file"  name="image">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="col-form-label pt-0" for="name_en">{{ __('main.Gateway') }} </label>
                                        <select class="form-control" id="name_en" name="gateway">
                                            <option value="" disapled >Select Type..</option>
                                            <option {{($info->gateway =="bookeey")?"selected":""}} value="bookeey" >bookeey</option>
                                            <option {{($info->gateway =="myfatoorah")?"selected":""}} value="myfatoorah" >myfatoorah</option>
                                            <option {{($info->gateway =="cash")?"selected":""}} value="cash" >cash</option>
                                        </select> 
                                    </div>
                                    
                                   <div class="form-group mb-3">
                                        <label class="col-form-label pt-0" for="name_en">{{ __('main.Domain') }} </label>
                                        <input class="form-control" id="name_en" type="text" value="{{@$info->settings->first()->domain}}"  name="domain">
                                    </div> 
                                    <div class="form-group mb-3">
                                        <label class="col-form-label pt-0" for="name_en">{{ __('main.Type') }} </label>
                                        <select class="form-control" id="name_en" name="type">
                                            <option value="" disapled >Select Type..</option>
                                            <option {{(@$info->settings->first()->type == "live")?"selected":""}} value="live" >live</option>
                                            <option {{(@$info->settings->first()->type == "test")?"selected":""}} value="test" >test</option>
                                        </select> 
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="col-form-label pt-0" for="name_en">{{ __('main.Marchent_Id') }} </label>
                                        <input class="form-control" id="name_en" type="text" value="{{$info->settings->first()->marchent_id}}"  name="marchent_id">
                                    </div> 
                                    <div class="form-group mb-3">
                                        <label class="col-form-label pt-0" for="name_en">{{ __('main.Secret_Key') }} </label>
                                        <input class="form-control" id="name_en" type="text" value="{{$info->settings->first()->secret_key}}"  name="secret_key">
                                    </div> 
                                    <div class="form-group mb-3">
                                        <label class="col-form-label pt-0" for="name_en">{{ __('main.Token') }} </label>
                                        <input class="form-control" id="name_en" type="text" value="{{@$info->settings->first()->token}}"  name="token">
                                    </div> 
                                   
                                   @if (count($errors) > 0)
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li class="mb-3"><div class="alert alert-danger outline">{{ $error }}</div></li>
                                        @endforeach
                                    </ul>
                                    @endif
                
                                    @if(Session::has('success'))
                                    <div class="alert alert-success outline">{{Session::get('success')}}</div>
                                    @endif

                                    <div class="d-flex align-items-center flex-wrap gap-3">
                                        <button type="submit" class="btn btn-primary">{{ __('main.Submit') }}</button>
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

