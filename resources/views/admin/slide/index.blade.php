@extends('layouts.default-layout.master')

@section('title'){{ __('main.Slides') }}
{{ $title }}
@endsection

@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3>{{ __('main.Slides') }} </h3>
@endslot
<li class="breadcrumb-item"> {{ __('main.Slides') }}</li>
@slot('breadcrumb_icon')
<li>
    <a href="{{route('slides.create')}}" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="plus"></i></a>

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
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if(@isset($data) && !@empty($data))
                                @foreach( $data as $info)

                                <tr>
                                    <td>{{$info->id}}</td>
                                    <td>{{$info->title}}</td>
                                    <td>{{$info->sub_title}}</td>
                                    <td><a href="{{$info->link}}">{{$info->link}}</a></td>


                                    <td>
                                        <a href="{{ route('slides.edit',$info->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('slides.delete',$info->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
    @foreach($video as $row)
    <div class="col-md-12 row">

        <div class="col-md-6">
            <h2>
                Slider Video
            </h2>
        </div>

        <div class="col-md-6" style="text-align: right;">
            <a href="{{ route('slides.video.edit',$row['id']) }}" data-container=" body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="video"></i></a>

        </div>




        <video autoplay muted loop id="myVideo" style="height: 200px; width: 200px;">
            <source src="{{ asset('uploads/video')}}/{{$row['video']}}" type="video/mp4" />
        </video>
        @endforeach


    </div>
</div>





@endsection