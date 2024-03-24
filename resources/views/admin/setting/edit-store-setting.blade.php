@extends('layouts.default-layout.master')

@section('title') {{ __('main.Store_Settings') }}
{{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush
@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3> {{ __('main.Store_Settings') }}  </h3>
        @endslot
        <li class="breadcrumb-item">   {{ __('main.Store_Settings') }}</li>
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
                                <form action={{route('setting.update.store')}} method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <div class="form-check mb-3">
                                        
                                        <label class="col-form-label pt-0" for="name_ar"> {{ __('main.Order_With_Login') }}</label>
                                        <input class="form-check-input" {{($info->order_with_login == "true")?"checked":""}} value="true"  id="name_ar" type="checkbox"  name="order_with_login">
                                        <label class="col-form-label pt-0" for="name_ar"> {{ __('main.Order_With_Login') }}</label>
                                    </div>
                                    
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" {{($info->order_return_possibility == "true")?"checked":""}} value="true"  id="name_ar" type="checkbox"  name="order_return_possibility">
                                        <label class="col-form-label pt-0" for="name_ar"> {{ __('main.Order_Return_Possibility	') }}</label>
                                    </div>
                                    
                                    <div class="form-check mb-3">
                                        <input id="cancel" class="form-check-input" {{($info->order_cancel_possibility == "true")?"checked":""}} value="true"  id="name_ar" type="checkbox"  name="order_cancel_possibility">
                                        <label class="col-form-label pt-0" for="name_ar"> {{ __('main.Order_Cancel_Possibility	') }}</label>
                                    </div>
                                    
                                    <div class="answer">
                                       <label for="coupon_field">{{ __('main.Status	') }}</label>
                                       <select type="text" name="status">
                                           <option  value="" disapled>select</option>
                                           <option {{($info->status == "ordered")?"selected":""}} value="ordered">ordered</option>
                                           <option {{($info->status == "delivered")?"selected":""}} value="delivered">delivered</option>
                                       </select>
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
        <script>
        $("#cancel").change(function(){
                checkedInput()
            });
            
            function checkedInput() {
                if($("#cancel").is(":checked")) {
                        $(".answer").show();
                }else{
                        $(".answer").hide();
                        $(".answer").find("select :selected").removeAttr("selected")
                    }
            }
            
            
            checkedInput()
            
            
        </script>
    @endpush


@endsection

