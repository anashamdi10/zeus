@extends('layouts.default-layout.master')

@section('title') {{ __('main.Create_Page') }}
{{ $title }}
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3> {{ __('main.Create_Page') }}</h3>
        @endslot
        <li class="breadcrumb-item"> {{ __('main.Create_Page') }}</li>
        @slot('breadcrumb_icon')
        @endslot
    @endcomponent

    <div class="container-fluid">
        <form action={{route('pages.store')}} method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="name_en"> {{ __('main.Name_En') }}</label>
                                <input class="form-control" id="name_en" rows="4"  name="name_en">
                            </div>
                            <div class="mb-3 ibox-content no-padding">
                                <label class="col-form-label pt-0" for="name_en">  {{ __('main.Desc_En') }}</label>
                                <textarea class="ckeditor form-control" rows="4" name="description_en">
                                    {{old('description')}}
                                </textarea>
                            </div>
                        </div>
                    </div>
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
                 <div class="d-flex align-items-center flex-wrap gap-3">
                    <button type="submit" class="btn btn-primary">{{ __('main.Submit') }}</button>
                    <a href="{{route('admin.pages')}}" class="btn btn-danger">{{ __('main.Cancel') }}</a>
                </div>
            </div>
            
        </form>
    </div>


@endsection