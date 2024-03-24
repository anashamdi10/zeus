@extends('layouts.default-layout.master')

@section('title') {{ __('main.Settings') }}
{{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush
@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3> {{ __('main.General_Settings') }} </h3>
        @endslot
        <li class="breadcrumb-item">   {{ __('main.General_Settings') }}</li>
        @slot('breadcrumb_icon')
        @endslot
    @endcomponent

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-xl-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                @if (count($errors) > 0)

                                    <div class="alert alert-danger">

                                        <ul>

                                            @foreach ($errors->all() as $error)

                                                <li>{{ $error }}</li>

                                            @endforeach

                                        </ul>

                                    </div>

                                @endif

                                @if(Session::has('success'))

                                    <div class="alert alert-success">{{Session::get('success')}}</div>

                                @endif
                            </div>
                            <div class="card-body">
                                <form action={{route('setting.update')}} method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_ar"> {{ __('main.Name_Ar') }} </label>
                                        <input class="form-control" value="{{$info->name_ar}}" id="name_ar" type="text"  name="name_ar">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">  {{ __('main.Name_En') }}  </label>
                                        <input class="form-control" value="{{$info->name_en}}" id="name_en" type="text"  name="name_en">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">  {{ __('main.Desc_Ar') }} </label>
                                        <textarea class="form-control"  id="name_en"   name="description_ar">{{$info->description_ar}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">  {{ __('main.Desc_En') }} </label>
                                        <textarea class="form-control"  id="name_en"   name="description_en">{{$info->description_en}}</textarea>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en"> {{ __('main.Image') }} </label>
                                        <input class="form-control"  id="name_en" type="file"  name="logo">
                                        <img src="{{$info->logo}}" width="50" height="50">
                                    </div>
                                    <button type="submit" class="btn btn-primary">{{ __('main.Submit') }}</button>
                                </form>                            </div>
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

