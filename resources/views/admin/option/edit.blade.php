@extends('layouts.default-layout.master')

@section('title') {{ __('main.Edit_Option') }} 
{{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>{{ __('main.Edit_Option') }}</h3>
        @endslot
        <li class="breadcrumb-item">  {{ __('main.Edit_Option') }}</li>
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
                                <form action="{{route('options.update',$info->id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                     {{method_field('PUT')}}
                                    <div class="form-group mb-3">
                                        <label class="col-form-label pt-0" for="name_ar"> {{ __('main.Name_Ar') }}</label>
                                        <input class="form-control" id="name_ar" type="text"   name="name_ar" value="{{$info->name_ar}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="col-form-label pt-0" for="name_en"> {{ __('main.Name_En') }}</label>
                                        <input class="form-control" id="name_en" type="text"  name="name_en" value="{{$info->name_en}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        
                                        <label class="col-form-label pt-0" for="name_en">{{ __('main.Type') }} </label>
                                        <select class="form-control" id="name_en" name="type">
                                            <option value="" disapled >Select Type..</option>
                                            <option value="checkbox" {{($info->type == "checkbox")?"selected":""}} >checkbox</option>
                                            <option value="radio" {{($info->type == "radio")?"selected":""}} >radio</option>
                                            <option value="select" {{($info->type == "select")?"selected":""}} >select</option>
                                        </select> 
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <label class="col-form-label pt-0" for="name_en">{{ __('main.Sort') }}  </label>
                                        <input class="form-control" id="name_en" type="number"  name="sort_order" value="{{$info->sort_order}}">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                              <thead>
                                                <tr>
                                                  <th scope="col">{{__('main.Name_Ar')}}</th>
                                                  <th scope="col">{{__('main.Name_En')}}</th>
                                                  <th scope="col">{{__('main.Image')}}</th>
                                                  <th scope="col"></th>
                                                </tr>
                                              </thead>
                                              <tbody id="optionRows">
                                                @foreach($info->values as $value)
                                                <tr id="optTr">
                                                    <td><input type="text" class="form-control" name="name_ar_arr[]" value="{{$value->name_ar}}"  required></td>
                                                    <td><input type="text" class="form-control" name="name_en_arr[]" value="{{$value->name_en}}"  required></td>
                                                    <td><input type="file" class="form-control" name="image[]"  required></td>
                                                    <td><button type="button" class="remove-tr btn btn-danger btn-sm">{{ __('main.Delete') }}</button></td>
                                                </tr>
                                                @endforeach
                                              </tbody>
                                            </table>
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
                                        <button type="button" name="add" id="add" class="btn btn-secondary"><i class="fal fa-plus"></i>{{ __('main.Add') }}</button>
                                        <button type="submit" class="btn btn-primary">{{ __('main.Submit') }}</button>
                                        <a href="{{route('admin.options')}}" class="btn btn-danger">{{ __('main.Cancel') }}</a>
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
        <script type="text/javascript">
            $("#add").click(function(){
                $("#optionRows").append(`
                    <tr id="optTr">
                        <td><input type="text" class="form-control" name="name_ar_arr[]"  required></td>
                        <td><input type="text" class="form-control" name="name_en_arr[]"  required></td>
                        <td><input type="file" class="form-control" name="image[]"  required></td>
                        <td><button type="button" class="remove-tr btn btn-danger btn-sm">{{ __('main.Delete') }}</button></td>
                    </tr>                                        `
                );
            });

            $(document).on('click', '.remove-tr', function(){
                $(this).closest('#optTr').remove();
            });
        </script>
    @endpush

@endsection