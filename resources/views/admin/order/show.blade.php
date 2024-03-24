@extends('layouts.default-layout.master')



@section('title') {{ __('main.Orders') }}
{{ $title }}
@endsection

@section('content')
    <div class="container-fluid">
        @component('components.breadcrumb')
            @slot('breadcrumb_title')
                <h3> {{ __('main.Order_Details') }}</h3>
            @endslot
            <li class="breadcrumb-item"> {{ __('main.Order_Details') }}</li>
        @endcomponent
        
        
                
        <!-- Modal -->
        <div class="modal fade" id="userInfoModal" tabindex="-1" role="dialog" aria-labelledby="userInfoModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">معلومات المستخدم</h5>
                        <button class="btn-close position-relative top-0 right-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex align-items-center gap-2 mb-4">
                            <h6 class="mb-0">{{ __('main.Name') }}:</h6><p class="mb-0">{{$info->user->name}}</p>
                        </div>
                        <div class="d-flex align-items-center gap-2 mb-4">
                            <h6 class="mb-0">{{ __('main.Email') }}:</h6><p class="mb-0">{{$info->user->email}}</p>
                        </div>
                        <div class="d-flex align-items-center gap-2 mb-4">
                            <h6 class="mb-0">{{ __('main.Phone') }}:</h6><p class="mb-0">{{$info->user->phone}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   


        <div class="card page-content-card">
            <div class="card-header b-l-primary border-3 d-flex align-items-center justify-content-between">
                <div>
                    <small class="mb-2">customer:</small>
                    <h5>{{$info->user->name}}</h5>
                </div>
                
                <div class="d-flex align-items-center flex-wrap gap-3">
                    <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#userInfoModal"><i class="fa fa-cog"></i></button>
                    <button class="btn btn-secondary btn-sm" type="button" onclick="printFun()"><i class="fa fa-print"></i></button>
                </div>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <div class="order-details">
                        <div class="main-info">
                            @if($info->status == 'approve' || $info->status == 'received')
                                 <span class="badge badge-primary d-table mb-3">{{$info->status}}</span>
                                 @elseif($info->status == 'disapprove' || $info->status == 'not_received')
                                 <span class="badge badge-danger d-table mb-3">{{$info->status}}</span>
                                 @endif

                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
                                    <h5 class="order-num">{{ __('main.Order_Number') }} : {{$info->order_number}}</h5>
                                    <small class="d-block"><i class="fa fa-calendar"></i> {{date('d-m-Y', strtotime($info->created_at))}}</small>
                                </div>  

                            <h6 class="order-total mb-4"> {{ __('main.Order_Total') }}: {{$info->total}}</h6>
                        </div>
                        
                        <h5>{{ __('main.Products') }}</h5>
                        <table class="display datatables table table-bordered" id="ajax-data-object">
                            <thead>
                            <tr>
                                <th> {{ __('main.Product_Name') }}</th>
                                <th>{{ __('main.Category') }}</th>
                                <th>{{ __('main.Price') }}</th>
                                <th>{{ __('main.Quantity') }}</th>
                                <th>{{ __('main.Total') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($info->items as $item)
                                <tr>
                                    <td>{{$item->product->name}}</td>
                                    <td>{{$item->product->productcategories->first()->category->name}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->price*$item->quantity}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-4 d-flex align-items-center flex-wrap gap-2 mb-4">
                        <h6 class="d-flex align-items-center gap-1 mb-0"><i class="fa fa-map-marker"></i>{{__('main.Shipping_Address')}}:</h6>
                        <p class="mb-0">{{$info->address->address}},{{$info->address->city->name}}</p>
                    </div>
                     
                    <div class="col-sm-4 d-flex align-items-center flex-wrap gap-2 mb-4">
                        <h6 class="d-flex align-items-center gap-1 mb-0"><i class="fa fa-money"></i>{{__('main.Payment_Method')}}:</h6>
                        <p class="mb-0">{{$info->method}}</p>
                    </div>
                     
                    <div class="col-sm-4 d-flex align-items-center flex-wrap gap-2 mb-4">
                        <h6 class="d-flex align-items-center gap-1 mb-0"><i class="fa fa-truck"></i>{{__('main.Shipping_Cost')}}:</h6>
                        <p class="mb-0">{{$info->shipping_cost}}KWD</p>
                    </div>
                     
                    <div class="col-sm-4 d-flex align-items-center flex-wrap gap-2 mb-4">
                        <h6 class="d-flex align-items-center gap-1 mb-0"><i class="fa fa-ticket"></i>{{__('main.Coupon')}}:</h6>
                        @if($info->coupon->amount) 
                        <p class="txt-primary mb-0">{{$info->coupon->amount}}KWD</p>
                        @else
                        <p class="txt-danger mb-0">لا يوجد كوبونات خصم</p>
                        @endif
                    </div>
                     
                    <div class="col-sm-4 d-flex align-items-center flex-wrap gap-2 mb-4">
                        <h6 class="d-flex align-items-center gap-1 mb-0">{{ __('main.Status') }}:</h6>
                        <select name="order_id" data-id="{{$info->id}}" class="order-status">
                            <option value="approve"  {{($info->status == "confirmed")?"selected":""}}   >{{ __('main.Approve') }} </option>
                            <option value="disapprove"  {{($info->status == "ordered")?"selected":""}} > {{ __('main.Disapprove') }}</option>
                            <option value="received" {{($info->status == "recieved")?"selected":""}} >{{ __('main.Received') }}</option>
                            <option value="not_received" {{($info->status == "delivered")?"selected":""}} >{{ __('main.Delivered') }}</option>
                            <option value="canceled" {{($info->status == "canceled")?"selected":""}} >{{ __('main.Canceled') }}</option>
                            <option value="canceled" {{($info->status == "returned")?"selected":""}} >{{ __('main.Returned') }}</option>
                            <option value="canceled" {{($info->status == "refused")?"selected":""}} >{{ __('main.Refused') }}</option>
                        </select>
                    </div>
                    
                    <div class="col-sm-4 d-flex align-items-center flex-wrap gap-2 mb-4">
                        <h6 class="d-flex align-items-center gap-1 mb-0">{{ __('main.Payment_Status') }}:</h6>
                        <select name="order_id" data-id="{{$info->id}}" class="order-payment-status">
                            <option value="1"  {{($info->paid == "paid")?"selected":""}}   >{{ __('main.Paid') }} </option>
                            <option value="0"  {{($info->paid == "not paid")?"selected":""}} > {{ __('main.Not_Paid') }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card d-none d-print-block" id="invoicePrint">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-1">{{ __('main.Order_Number') }}</h5>
                                <p>{{$info->order_number}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-1">{{ __('main.Order_Date') }}</h5>
                                <p>{{date('d-m-Y', strtotime($info->created_at))}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-1">{{ __('main.Name') }}</h5>
                                <p>{{$info->user->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-1">{{ __('main.Phone') }}</h5>
                                <p>{{$info->user->phone}}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-1">{{ __('main.Email') }}</h5>
                                <p> 
                                    @if($info->user->email)
                                    {{$info->user->email}}
                                    @else
                                    No Email
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-1">{{__('main.Shipping_Address')}}</h5>
                                <p>{{$info->address->address}},{{$info->address->city->name}}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-1">{{__('main.Payment_Method')}}</h5>
                                <p>{{$info->method}}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-1">{{__('main.Shipping_Address')}}</h5>
                                <p id="printStatus">{{$info->status}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-1">{{__('main.Shipping_Address')}}</h5>
                                <p id="printPaymentStatus">{{$info->paid}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                        <table class="display datatables table table-bordered" id="ajax-data-object">
                            <thead>
                            <tr>
                                <th> {{ __('main.Product_Name') }}</th>
                                <th>{{ __('main.Category') }}</th>
                                <th>{{ __('main.Price') }}</th>
                                <th>{{ __('main.Quantity') }}</th>
                                <th>{{ __('main.Total') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($info->items as $item)
                                <tr>
                                    <td>{{$item->product->name}}</td>
                                    <td>{{$item->product->productcategories->first()->category->name}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->price*$item->quantity}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <th colspan="4" class="text-end">Sub Total</th>
                                    <td>{{$item->price*$item->quantity}}</td>
                                </tr>
                                <tr>
                                    <th colspan="4" class="text-end">{{__('main.Shipping_Cost')}}</th>
                                    <td>{{$info->shipping_cost}}KWD</td>
                                </tr>
                                <tr>
                                    <th colspan="4" class="text-end">{{__('main.Coupon')}}</th>
                                    <td>
                                        @if($info->coupon->amount) 
                                        {{$info->coupon->amount}}KWD
                                        @else
                                        0
                                        @endif
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th colspan="4" class="text-end">{{ __('main.Order_Total') }}</th>
                                    <td>{{$info->total}}</td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $('.order-status').on('change',function(){
        var status = $(this).find(":selected").val(),
            text = $(this).find(":selected").text(),
            id = $(this).data('id');
            $.ajax({
                url : "{{ route('status') }}",
                method : "POST",
                data : {
                    _token : "{{ csrf_token() }}",
                    status : status,
                    order_id : id
                },
                success: ()=>{
                    $("#printStatus").text(text)
                }
            });
        });
        
        $('.order-payment-status').on('change',function(){
        var status = $(this).find(":selected").val(),
            text = $(this).find(":selected").text(),
            id = $(this).data('id');
            $.ajax({
                url : "{{ route('payment.status') }}",
                method : "POST",
                data : {
                    _token : "{{ csrf_token() }}",
                    status : status,
                    order_id : id
                },
                success: ()=>{
                    $("#printPaymentStatus").text(text)
                }
            });
        });
        
        function printFun(){
            window.print()
        }
    </script>
    @endpush

@endsection

@push('styles')
<style>

@media print{
    .page-main-header,
        .main-nav,
        .footer,
        .page-header,
        .page-content-card {
            display:none !important;
        }

        .page-wrapper.compact-wrapper .page-body-wrapper .page-body{
            margin: 0 !important;
        }
}
        table{
            page-break:avoid !important
        }
        
        
        
    
    @page {
          size: A4 landscape !important;
            margin: 0;
        }
    
</style>
@endpush