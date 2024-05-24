@extends('layouts.default-layout.master')

@section('title')
zeus - home
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/daterange-picker.css') }}">
@endpush

@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3>{{ __('main.home') }}</h3>
@endslot

@endcomponent



<div class="container-fluid">
  <div class="row">
    <!-- <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden border-0">
                    <div class="bg-primary b-r-4 card-body">
                        <div class="media static-top-widget">
                            <div class="align-self-center text-center"><i data-feather="users"></i></div>
                            <div class="media-body"><span class="m-0">{{ __('main.Users') }}</span>
                                <h4 class="mb-0 counter">{{$users}}</h4><i class="icon-bg" data-feather="users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

    <div class="col-sm-6 col-xl-3 col-lg-6">
      <div class="card o-hidden border-0">
        <div class="bg-secondary b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center"><i data-feather="box"></i></div>
            <div class="media-body"><span class="m-0">{{ __('main.Products') }}</span>
              <h4 class="mb-0 counter">{{$products}}</h4><i class="icon-bg" data-feather="box"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-xl-3 col-lg-6">
      <div class="card o-hidden border-0">
        <div class="bg-primary b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center"><i data-feather="list"></i></div>
            <div class="media-body"><span class="m-0">{{ __('main.Categories') }} </span>
              <h4 class="mb-0 counter">{{$cats}}</h4><i class="icon-bg" data-feather="list"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-xl-3 col-lg-6">
      <div class="card o-hidden border-0">
        <div class="bg-secondary b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center"><i data-feather="git-pull-request"></i></div>
            <div class="media-body"><span class="m-0">{{ __('main.Sub_Categories') }} </span>
              <h4 class="mb-0 counter">{{$subCats}}</h4><i class="icon-bg" data-feather="git-pull-request"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-xl-3 col-lg-6">
      <div class="card o-hidden border-0">
        <div class="bg-primary b-r-4 card-body">
          <div class="media static-top-widget">
            <div class="align-self-center text-center"><i data-feather="shopping-bag"></i></div>
            <div class="media-body"><span class="m-0">{{ __('main.Orders') }}</span>
              <h4 class="mb-0 counter">{{$orders}}</h4><i class="icon-bg" data-feather="shopping-bag"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>

<!-- <div class="container-fluid">
  <div class="row">
    <div class="col-xl-6 xl-50 box-col-12">
      <div class="widget-joins card widget-arrow">
        <div class="row">
          <div class="col-sm-6 pe-0">
            <div class="media border-after-xs">
              <div class="align-self-center me-3 text-start"><span class="widget-t mb-1">Sale</span>
                <h5 class="mb-0">Today</h5>
              </div>
              <div class="media-body align-self-center"><i class="font-primary" data-feather="arrow-down"></i></div>
              <div class="media-body">
              </div>
            </div>
          </div>
          <div class="col-sm-6 ps-0">
            <div class="media">
              <div class="align-self-center me-3 text-start"><span class="widget-t mb-1">Sale</span>
                <h5 class="mb-0">Month</h5>
              </div>
              <div class="media-body align-self-center"><i class="font-primary" data-feather="arrow-up"></i></div>
              <div class="media-body ps-2">
              </div>
            </div>
          </div>
          <div class="col-sm-6 pe-0">
            <div class="media border-after-xs">
              <div class="align-self-center me-3 text-start"><span class="widget-t mb-1">Sale</span>
                <h5 class="mb-0">Week</h5>
              </div>
              <div class="media-body align-self-center"><i class="font-primary" data-feather="arrow-up"></i></div>
              <div class="media-body">
              </div>
            </div>
          </div>
          <div class="col-sm-6 ps-0">
            <div class="media">
              <div class="align-self-center me-3 text-start"><span class="widget-t mb-1">Sale</span>
                <h5 class="mb-0">Year</h5>
              </div>
              <div class="media-body align-self-center ps-3"><i class="font-primary" data-feather="arrow-up"></i></div>
              <div class="media-body ps-2">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-6 xl-50 box-col-12">
      <div class="widget-joins card">
        <div class="row">
          <div class="col-sm-6 pe-0">
            <div class="media border-after-xs">
              <div class="align-self-center me-3">68%<i class="fa fa-angle-up ms-2"></i></div>
              <div class="media-body details ps-3"><span class="mb-1">New</span>
              </div>
              <div class="media-body align-self-center"><i class="font-primary float-end ms-2" data-feather="shopping-bag"></i></div>
            </div>
          </div>
          <div class="col-sm-6 ps-0">
            <div class="media">
              <div class="align-self-center me-3">12%<i class="fa fa-angle-down ms-2"></i></div>
              <div class="media-body details ps-3"><span class="mb-1">Pending</span>
              </div>
              <div class="media-body align-self-center"><i class="font-primary float-end ms-3" data-feather="layers"></i></div>
            </div>
          </div>
          <div class="col-sm-6 pe-0">
            <div class="media border-after-xs">
              <div class="align-self-center me-3">68%<i class="fa fa-angle-up ms-2"></i></div>
              <div class="media-body details ps-3 pt-0"><span class="mb-1">Done</span>
              </div>
              <div class="media-body align-self-center"><i class="font-primary float-end ms-2" data-feather="shopping-cart"></i></div>
            </div>
          </div>
          <div class="col-sm-6 ps-0">
            <div class="media">
              <div class="align-self-center me-3">68%<i class="fa fa-angle-up ms-2"></i></div>
              <div class="media-body details ps-3 pt-0"><span class="mb-1">Cancel</span>
              </div>
              <div class="media-body align-self-center"><i class="font-primary float-end ms-2" data-feather="dollar-sign"></i></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-6 box-col-12 des-xl-100 top-dealer-sec">
      <div class="card">
        <div class="card-header pb-0">
          <div class="header-top d-flex justify-content-between align-items-center flex-wrap gap-3">
            <h5>Top Dealer</h5>
            <div class="center-content p-0 m-0">
              <p class="d-sm-flex align-items-center m-0"><span class="m-r-10">845 Dealer</span><i class="toprightarrow-primary fa fa-arrow-up m-r-10"></i>86% More Than Last Year</p>
            </div>

          </div>
        </div>
        <div class="card-body">
          <div class="owl-carousel owl-theme" id="owl-carousel-14">
            <div class="item">
              <div class="owl-carousel-16 owl-carousel owl-theme">
                @foreach($most_orderd as $user)
                <div class="item">
                  <div class="card">
                    <div class="top-dealerbox text-center"><img class="card-img-top" src="{{$user->image}}" alt="...">
                      <h6> {{$user->name}}</h6>
                      <p>Malasiya</p><a class="btn btn-rounded" href="social-app.html">View More</a>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6 box-col-12 des-xl-100 top-sell-sec">
      <div class="card">
        <div class="card-header pb-0">
          <div class="header-top d-sm-flex justify-content-between align-items-center">
            <h5>Top Selling Product</h5>
          </div>
        </div>
        <div class="card-body">
          @foreach($most_sales as $most_sale)
          <div class="media mb-4"><img class="img-fluid" width="50" height="50" src="{{$most_sale->image}}" alt="">
            <div class="media-body">
              <a href="product-page.html">
                <h6></h6>
              </a>
              <p>New Offer Only </p>
              <ul class="rating-star">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
              </ul>
            </div>
            <a class="btn btn-iconsolid" href="cart.html"><i class="icon-bag"></i></a>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div> -->

<div class="container-fluid">
  <div class="row">
    <div class="col-xl-6 xl-100 box-col-12">
      <div class="card">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
          <h5>Resent Orders</h5>
        </div>
        <div class="card-body">
          <div class="user-status table-responsive">
            <table class="table table-bordernone">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Order Name</th>
                  <th scope="col">Quantity</th>
                </tr>
              </thead>
              <tbody>
                @foreach( $orders_table as $info)
                <tr>
                  <td>{{$info->name}}</td>
                  <td>{{$info->product_name}}</td>
                  <td>{{$info->quantity}}</td>
                </tr>

                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-6 xl-100 box-col-12">
      <div class="card">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
          <h5>Product Deficiencies</h5>
        </div>

        <div class="card-body">
          <div class="user-status table-responsive">
            <table class="table table-bordernone">
              <thead>
                <tr>
                  <th scope="col">Product Code </th>
                  <th scope="col">Name</th>
                  <th scope="col">harvest sessions</th>

                </tr>
              </thead>
              <tbody>
                @foreach($shortages as $shortage)
                <tr>
                  <td class="f-w-600">
                    {{$shortage->product_code}}
                  </td>
                  <td class="f-w-600">
                    {{$shortage->name_en}}
                  </td>
                  <td>{{$shortage->harvest_sessions}}</td>
                
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
@push('scripts')
<script src="{{asset('assets/js/datepicker/daterange-picker/daterange-picker.custom.js')}}"></script>
<script src="{{asset('assets/js/owlcarousel/owl-custom.js')}}"></script>
<script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>
<script>
  $('#owl-carousel-14').owlCarousel({
    items: 4,
    margin: 10,
    autoHeight: true,
    nav: false
  }),
</script>
@endpush