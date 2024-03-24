@extends('layouts.default-layout.master')

@section('title'){{ __('main.Slides') }}
{{ $title }}
@endsection

@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3>About </h3>
@endslot
<li class="breadcrumb-item"> About</li>
@slot('breadcrumb_icon')

@endslot
@endcomponent

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @foreach($data as $row)
                        <form action="{{route('about.update',$row->id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-6">

                                        <h4>Title</h4>
                                    </div>
                                    <div class="col-md-6" style="text-align: right;">
                                        <buttom id='btn' onclick="edit()" style="color: #3a9aa8;" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="edit"></i></buttom>
                                        <button id='link' type="submit" style="color: #3a9aa8; display: none; border:none;"><i data-feather="save"></i></button>
                                    </div>
                                </div>
                                <input id='title' name="title" class="form-control" type="text" readonly value="{{$row->title}}">
                            </div>
                            <div class="form-group mb-3">
                                <h4>pragraph</h4>
                                <input name="pragraph" id='pragraph' class="form-control" type="text" readonly value="{{$row->pragraph}}" id="">
                            </div>

                            <div class="form-group mb-3">
                                <h4>image</h4>
                                <img src="{{ asset('uploads/about/' . $row->image) }}" width="80px" height="80px" style="margin-bottom: 10px; " /> <br>
                                <input id='image' name="image" type="file" class="form-control" style="display: none;" value="" id="">
                            </div>
                        </form>
                        @endforeach
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
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
</div>


<script>
    function edit() {
        var link = document.getElementById("link");
        var title = document.getElementById("title");
        var pragraph = document.getElementById("pragraph");
        var image = document.getElementById("image");
        var btn = document.getElementById("btn");

        link.style.display = null;
        image.style.display = null;
        btn.style.display = "none";
        title.removeAttribute('readonly');
        pragraph.removeAttribute('readonly');
    }
</script>


@endsection