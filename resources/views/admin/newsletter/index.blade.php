@extends('layouts.default-layout.master')

@section('title')
NewsLetter
@endsection

@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3>NewsLetter </h3>
@endslot
<li class="breadcrumb-item">NewsLetter </li>
@slot('breadcrumb_icon')
<li class="p-0">
    <a href="{{route('newsletter.exportToExcel')}}" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="book-open"></i></a>
</li>
@endslot
@endcomponent

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table display datatables" id="ajax-data-object">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Emails</th>

                                </tr>
                            </thead>
                            <tbody>

                                @if(@isset($data) && !@empty($data))
                                @foreach( $data as $info)

                                <tr>
                                    <td>{{$info->id}}</td>
                                    <td>{{$info->email}}</td>


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



@endsection