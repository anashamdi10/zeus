@extends('layouts.default-layout.master')

@section('title')Counter
{{ $title }}
@endsection

@section('content')
@component('components.breadcrumb')
@slot('breadcrumb_title')
<h3>Counter </h3>
@endslot
<li class="breadcrumb-item"> Counter</li>
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
                        <form action="{{route('counter.update',$row->id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group mb-3">
                                <div class="row">
                                    <div class="col-md-6">

                                        <h4>Facilities</h4>
                                    </div>
                                    <div class="col-md-6" style="text-align: right;">
                                        <buttom id='btn' onclick="edit()" style="color: #3a9aa8;" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="edit"></i></buttom>
                                        <button id='link' type="submit" style="color: #3a9aa8; display: none; border:none;"><i data-feather="save"></i></button>
                                    </div>
                                </div>
                                <input id='facilities' name="facilities" class="form-control" type="number" readonly value="{{$row->facilities}}">
                            </div>
                            <div class="form-group mb-3">
                                <h4>Porducts</h4>
                                <input name="porducts" type="number" id='porducts' class="form-control" type="text" readonly value="{{$row->Porducts}}">
                            </div>

                            <div class="form-group mb-3">
                                <h4>Produced Tons in 2023</h4>
                                <input id='tons' name="tons" type="number" class="form-control" readonly value="{{$row->Produced_Tons_in_2023}}">
                            </div>
                            <div class="form-group mb-3">
                                <h4>Oustees Clients</h4>
                                <input id='oustees' name="oustees" type="number" class="form-control" readonly value="{{$row->Oustees_Clients}}">
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
        var facilities = document.getElementById("facilities");
        var porducts = document.getElementById("porducts");
        var tons = document.getElementById("tons");
        var oustees = document.getElementById("oustees");
        var btn = document.getElementById("btn");
        var link = document.getElementById("link");


        btn.style.display = "none";
        link.style.display = null;
        facilities.removeAttribute('readonly');
        porducts.removeAttribute('readonly');
        tons.removeAttribute('readonly');
        oustees.removeAttribute('readonly');
    }
</script>


@endsection