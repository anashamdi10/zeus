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
            <h3> {{ __('main.Contact_Info') }}  </h3>
        @endslot
        <li class="breadcrumb-item">   {{ __('main.Contact_Info') }}</li>
        @slot('breadcrumb_icon')
        @endslot
    @endcomponent

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-xl-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form action={{route('setting.update.contact')}} method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <div class="form-group mb-3">
                                        <label class="col-form-label pt-0" for="name_ar"> {{ __('main.Phone') }}</label>
                                        <input class="form-control" value="{{$info->phone}}" id="name_ar" type="text"  name="phone">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="col-form-label pt-0" for="name_en">  {{ __('main.Email') }} </label>
                                        <input class="form-control" value="{{$info->email}}" id="name_en" type="text"  name="email">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="col-form-label pt-0" for="name_en"> {{ __('main.Facebook') }} </label>
                                        <input class="form-control" value="{{$info->facebook}}" id="name_en" type="text"  name="facebook">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="col-form-label pt-0" for="name_en">{{ __('main.Whatsapp') }} </label>
                                        <input class="form-control" value="{{$info->whatsapp}}" id="name_en" type="text"  name="whatsapp">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="col-form-label pt-0" for="name_en">{{ __('main.Instagram') }} </label>
                                        <input class="form-control" value="{{$info->instagram}}" id="name_en" type="text"  name="instagram">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="col-form-label pt-0" for="name_en">{{ __('main.Twitter') }}  </label>
                                        <input class="form-control" value="{{$info->twitter}}" id="name_en" type="text"  name="twitter">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="col-form-label pt-0" for="name_en">{{ __('main.Snapchat') }}  </label>
                                        <input class="form-control" value="{{$info->snapchat}}" id="name_en" type="text"  name="snapchat">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="col-form-label pt-0" for="name_en"> {{ __('main.Telegram') }} </label>
                                        <input class="form-control" value="{{$info->telegram}}" id="name_en" type="text"  name="telegram">
                                    </div>
                                    
                                   @if (count($errors) > 0)
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li class="mb-3"><div class="alert alert-danger outline">{{ $error }}</div></li>
                                        @endforeach
                                    </ul>
                                    @endif
                
                                    @if(Session::has('success'))
                                    <div class="alert alert-success outline">{{Session::get('success')}}</div>
                                    @endif

                                    <div class="d-flex align-items-center flex-wrap gap-3">
                                        <button type="submit" class="btn btn-primary">{{ __('main.Submit') }}</button>
                                    </div>
                                </form>
                            </div>
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

