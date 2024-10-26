@extends('layouts.default-layout.master')

@section('title'){{ __('main.Edit_Category') }}
{{ $title }}
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>  {{ __('main.Edit_Category') }}</h3>
        @endslot
        <li class="breadcrumb-item">  {{ __('main.Edit_Category') }}</li>
        @slot('breadcrumb_icon')
        @endslot
    @endcomponent

    <div class="container-fluid">
        <form action={{route('categories.update',$info->id)}} method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="row">
                
                
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="col-form-label pt-0" for="name_en"> {{ __('main.Name_En') }}</label>
                                <input class="form-control" value="{{$info->name_en}}" id="name_en" type="text"  name="name_en">
                            </div>
    
                            <div class="mb-3  ibox-content no-padding">
                                <label class="col-form-label pt-0" for="name_en">  {{ __('main.Desc_En') }}</label>
                                <textarea class="ckeditor form-control" rows="4" name="description_en">
                                    {{$info->description_en}}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label class="col-form-label pt-0" for="name_en"> {{ __('main.Category') }}</label>
                        <select name="parent_id" id="categories" class="form-control" >
                            <option disabled> اختر القسم</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{($category->id ==$info->parent_id)? "selected":""}}>{{ $category->name_ar }}</option>
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
                        <a href="{{route('categories')}}" class="btn btn-danger">{{ __('main.Cancel') }}</a>
                    </div>
                </div>
            </div>
        </form>  
    </div>

@endsection

