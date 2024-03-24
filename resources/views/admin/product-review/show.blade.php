@extends('layouts.default-layout.master')

@section('title') التقيمات
{{ $title }}
@endsection

@section('content')
<div class="container-fluid">
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
        <h3>تفاصيل التقييم</h3>
        @endslot
        <li class="breadcrumb-item">تفاصيل التقييم</li>
    @endcomponent
        
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="order-details">
                            <div class="main-info">
                                <div class="d-flex align-items-center flex-wrap gap-2 mb-4">
                                    <h6 class="order-num mb-0">اسم المنتج:</h6> 
                                    <p class="mb-0">{{@$info->product->name_ar}}</p>
                                </div>
                                <div class="d-flex align-items-center flex-wrap gap-2 mb-4">
                                    <h6 class="order-total mb-0">اسم المستخدم:</h6>
                                    <p class="mb-0">{{@$info->user->name}}</p>
                                </div>
                                <div class="d-flex align-items-center flex-wrap gap-2 mb-4">
                                    <h6 class="order-total mb-0">التقييم:</h6>
                                    <p class="mb-0">{{$info->comment}}</p>
                                </div>
                                <div class="d-flex align-items-center flex-wrap gap-2 mb-4">
                                    <h6 class="order-total mb-0">الحالة:</h6>
                                    <select name="status" data-id="{{$info->id}}" class="product-review-status mb-0">
                                        <option value="not_accept"  {{($info->status == "not_accept")?"selected":""}}>not_accept</option>
                                        <option value="accept"  {{($info->status == "accept")?"selected":""}}>accept</option>
                                    </select> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$('.product-review-status').on('change',function(){
      var status = $(this).val(),
          id = $(this).data('id')
     $.ajax({
         url : "{{ route('product.review.status') }}",
         method : "POST",
         data : {
             _token : "{{ csrf_token() }}",
             status : status,
             product_id : id
         }
     });
  });
</script>
@endpush

@endsection