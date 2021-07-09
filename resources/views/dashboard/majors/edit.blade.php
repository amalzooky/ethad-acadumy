@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.major.edit') @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">@lang('dashboard.major.edit')</h3>
                    <div class="card-options">
                        <a href="{{ route('majors.index') }}"><button class="btn btn-info pull-left">@lang('dashboard.header.majors') <i class="fe fe-chevron-left" aria-hidden="true"></i></button></a>
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{route('majors.update', $major->id)}}" method="POST" class="ajax" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">@lang('dashboard.major.name')</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                <i class="fe fe-book"></i>
                                </span>
                                <input type="text" class="form-control" id="name" name="name" placeholder="@lang('dashboard.major.name')"  value="{{$major->name}}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">@lang('dashboard.major.description')</label>
                            <textarea class="form-control" id="description" name="description" rows="5" placeholder="@lang('dashboard.major.description')..." required>{{$major->description}}</textarea>
                        </div>
                        <div class="form-group">
{{--                                <div class="form-group select-image-from-media">--}}
{{--                                    <label>{{__('dashboard.major.image')}}</label>--}}
{{--                                    <div class="input-group">--}}
{{--                                        <input value="{{$major->image}}" required id="select-thumbnail"  name="image" class="form-control">--}}
{{--                                        <div class="btn-group ">--}}
{{--                                            <button data-type="image" type="button" data-id="select-thumbnail" class="btn btn-primary btn-sm" data-preview="select-thumbnail-preview"><i class="fe fe-folder-plus"></i></button>--}}
{{--                                            <button data-trigger="focus" data-placement="top" data-toggle="popover"  id="select-thumbnail-preview" class="disabled btn btn-primary btn-sm" type="button"  ><i class="fe fe-search"></i></button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        <div class="form-group">
                            <div class="form-label">@lang('global.status')</div>
                            <label class="custom-switch">
                                <input type="checkbox" name="is_active" id="is_active" class="custom-switch-input" {{$major->is_active ? 'checked' : ''}} value="1">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                        <button  type="submit" class="btn btn-primary btn-block mt-5">@lang('global.save')</button>
                    </form>
                  </div><!-- end card body -->
                </div>
            </div>
        </div> <!-- end row -->
    </div>
@endsection
