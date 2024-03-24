@extends('layouts.default-layout.master')

@section('title') {{ __('main.Edit_Admin') }}
{{ $title }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>{{ __('main.Admins') }}</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{ __('main.home') }}</a></li>
                        <li class="breadcrumb-item"> {{ __('main.Edit_Admin') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
                            <div class="card-body">
                                <form action={{route('admins.update',$info->id)}} method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <div class="form-group mb-3">
                                        <label class="col-form-label pt-0" for="name_ar">{{ __('main.Name') }} </label>
                                        <input class="form-control" id="name_ar" type="text" value="{{$info->name}}"   name="name">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="col-form-label pt-0" for="name_en"> {{ __('main.Email') }}</label>
                                        <input class="form-control" id="name_en" type="text" value="{{$info->email}}"  name="email">
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <label class="col-form-label pt-0" for="name_en"> {{ __('main.Password') }}</label>
                                        <input class="form-control" id="name_en" type="text"  name="password">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="col-form-label pt-0" for="name_en">  {{ __('main.Confirm_Password') }}</label>
                                        <input class="form-control" id="name_en" type="text"  name="password_confirmation">
                                    </div>

                                    <div class="mb-2">
                                        <label class="col-form-label">Role:</label>
                                        <select class="js-example-basic-multiple col-sm-12" name="role">
                                            <option value="" disabled>Select role</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}"  {{ in_array($role->name, $userRole) ? 'selected': '' }}>{{$role->name}}</option>
                                            @endforeach
                                        </select>

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

