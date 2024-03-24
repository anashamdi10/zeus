@extends('layouts.default-layout.master')
@section('title'){{ __('main.Create_User') }}
{{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>{{ __('main.Users') }}</h3>
                    <ol class="breadcrumb">
                        {{--<li class="breadcrumb-item"><a href="{{route('admin')}}">{{ __('main.home') }}</a></li>--}}
                        <li class="breadcrumb-item"> {{ __('main.Create_User') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

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
                                <form action={{route('users.store')}} method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_ar">{{ __('main.Name') }} </label>
                                        <input class="form-control" id="name_ar" type="text"   name="name">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en"> {{ __('main.Email') }}</label>
                                        <input class="form-control" id="name_en" type="text"  name="email">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">  {{ __('main.Phone') }}</label>
                                        <input class="form-control" id="name_en" type="text"  name="phone">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en"> {{ __('main.Password') }}</label>
                                        <input class="form-control" id="name_en" type="text"  name="password">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">  {{ __('main.Confirm_Password') }}</label>
                                        <input class="form-control" id="name_en" type="text"  name="password_confirmation">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en"> {{ __('main.Country') }}</label>
                                        <select class="form-control"  name="country_id">
                                            <option disapled selected> {{ __('main.Select_Country') }}</option>
                                            @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">{{ __('main.Submit') }}</button>
                                    <button class="btn btn-secondary">{{ __('main.Cancel') }}</button>
                                </form>

                                @push('scripts')
                                    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
                                    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
                                    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
                                    <script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
    @endpush

@endsection