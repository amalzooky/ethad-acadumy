@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.groups.edit') @stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">@lang('dashboard.groups.edit')</h3>
                    <div class="card-options">
                        <a href="{{ route('groups.index') }}"><button class="btn btn-info pull-left">@lang('dashboard.header.groups') <i class="fe fe-chevron-left" aria-hidden="true"></i></button></a>
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{route('groups.update', $group->id)}}" method="POST" class="ajax" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="name" class="form-label">@lang('dashboard.groups.name')</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                <i class="fe fe-users"></i>
                                </span>
                                <input type="text" class="form-control" id="name" name="name" placeholder="@lang('dashboard.groups.name')"  value="{{$group->name}}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">@lang('dashboard.groups.description')</label>
                            <textarea class="form-control" id="description" name="description" rows="5" placeholder="@lang('dashboard.groups.description')..." required>{{$group->description}}</textarea>
                        </div>
                        <div class="form-group">
{{--                            <div class="form-group select-image-from-media">--}}
{{--                                <label class="form-label">{{__('dashboard.groups.image')}}</label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <input id="select-thumbnail" type="text" name="image" class="form-control" value="{{$group->image}}">--}}
{{--                                    <div class="btn-group ">--}}
{{--                                        <button data-type="image" type="button" data-id="select-thumbnail" class="btn btn-primary btn-sm" data-preview="select-thumbnail-preview"><i class="fe fe-folder-plus"></i></button>--}}
{{--                                        <button data-trigger="focus" data-placement="top" data-toggle="popover"  id="select-thumbnail-preview" class="disabled btn btn-primary btn-sm" type="button"  ><i class="fe fe-search"></i></button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <button  type="submit" class="btn btn-primary btn-block mt-5">@lang('global.save')</button>
                    </form>
                  </div><!-- end card body -->
                </div>
            </div>
        </div> <!-- end row -->
    </div>
@endsection
