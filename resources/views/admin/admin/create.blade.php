@extends('layouts.default-layout.master')
@section('title') {{ __('main.Create_Admin') }}
{{ $title }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-6">
                <h3>{{__('main.Admins')}}</h3>
                <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="{{route('admin')}}">{{__('main.home')}}</a></li>
                    <li class="breadcrumb-item">{{__('main.Create_Admin')}}</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action={{route('admins.store')}} method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group mb-3">
                    <label class="col-form-label pt-0" for="name_ar">{{ __('main.Name') }} </label>
                    <input class="form-control" id="name_ar" type="text"   name="name">
                </div>
                <div class="form-group mb-3">
                    <label class="col-form-label pt-0" for="name_en">{{ __('main.Email') }} </label>
                    <input class="form-control" id="name_en" type="text"  name="email">
                </div>
                <div class="form-group mb-3">
                    <label class="col-form-label pt-0" for="name_en"> {{ __('main.Phone') }} </label>
                    <input class="form-control" id="name_en" type="text"  name="mobile">
                </div>
                <div class="form-group mb-3">
                    <label class="col-form-label pt-0" for="name_en"> {{ __('main.Password') }}</label>
                    <input class="form-control" id="name_en" type="text"  name="password">
                </div>
                <div class="form-group mb-3">
                    <label class="col-form-label pt-0" for="name_en">  {{ __('main.Confirm_Password') }}</label>
                    <input class="form-control" id="name_en" type="text"  name="password_confirmation">
                </div>
                
                <div class="select2-drpdwn">
                    <div class="form-group mb-3">
                        <label class="col-form-label">Role</label>
                        <select class="js-example-placeholder-multiple" multiple="multiple">
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
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
                    <a href="{{route('admins')}}" class="btn btn-danger">{{ __('main.Cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection