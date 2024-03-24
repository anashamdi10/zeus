@extends('layouts.default-layout.master')

@section('title') {{ __('main.Rabid_Offers') }}
{{ $title }}
@endsection

@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3> {{ __('main.Rabid_Offers') }} </h3>
@endslot
<li class="breadcrumb-item"> {{ __('main.Rabid_Offers') }} </li>
@slot('breadcrumb_icon')
<li>
    <a href="{{route('flash.deals.create')}}" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="plus"></i></a>
</li>
@endslot
@endcomponent

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display datatables" id="ajax-data-object">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('main.Product_Name') }}</th>
                                    <th>Sales Price</th>
                                    <th>Title</th>
                                    <th>{{ __('main.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(@isset($data) && !@empty($data))
                                @foreach( $data as $idx => $dt)

                                <tr>
                                    <td>{{$idx+1}}</td>
                                    <td>{{$dt->product_name}}</td>
                                    <td>{{$dt->sale_price}}</td>
                                    <td>{{$dt->title}}</td>
                                    <td>
                                        <img src="{{ asset('uploads/offers/' . $dt->image) }}" width="75px" height="75px" />
                                    </td>

                                    <td>
                                        <a href="{{ route('flash_deals.edit',$dt->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('flash_deals.destroy',$dt->id) }}" class="btn btn-danger btn-sm">Delete<a>
                                    </td>

                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5" class="alert alert-danger">No Data</td>
                                </tr>

                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- @push('scripts')
<script type="text/javascript">
    $('#ajax-data-object').DataTable({
        processing: true,
        serverSide: true,
        "ajax": "{{ route('flash.deals.index') }}",
        "columns": [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'product',
                name: 'product'
            },
            {
                data: 'sale_price',
                name: 'sale_price'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });
</script>
@endpush -->

@endsection