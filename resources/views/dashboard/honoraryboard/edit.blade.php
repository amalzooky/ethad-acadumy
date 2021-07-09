@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.honoraryboards.edit') @stop

@section('content')
    <div class="container profile">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">@lang('dashboard.groups.create')</h3>
                    <div class="card-options">
                        <a href="{{ route('honoraryboards.index') }}"><button class="btn btn-info pull-left">@lang('dashboard.header.honoraryboard') <i class="fe fe-chevron-left" aria-hidden="true"></i></button></a>
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{route('honoraryboards.update',[$honoraryboard->id])}}" method="POST" class="ajax" enctype="multipart/form-data">
                        @csrf
                        @method("patch")
                        <div class="form-group">
                            <label for="name" class="form-label">@lang('dashboard.honoraryboards.name')</label>
                            <div class="input-icon">  
                                <span class="input-icon-addon">
                                <i class="fe fe-users"></i>
                                </span>
                                <input value="{{$honoraryboard->name}}" type="text" class="form-control" id="name" name="name" placeholder="@lang('dashboard.honoraryboards.name')"  required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="form-label">@lang('dashboard.honoraryboards.university')</label>
                            <div class="input-icon">  
                                <span class="input-icon-addon">
                                <i class="fe fe-users"></i>
                                </span>
                                <input value="{{$honoraryboard->university}}" type="text" class="form-control" id="university" name="university" placeholder="@lang('dashboard.honoraryboards.university')" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="form-label">@lang('dashboard.header.major')</label>
                            <div class="input-icon">  
                                <span class="input-icon-addon">
                                <i class="fe fe-users"></i>
                                </span>
                                <input value="{{$honoraryboard->major}}" type="text" class="form-control" id="major" name="major" placeholder="@lang('dashboard.header.major')"  required >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="name" class="form-label">@lang('dashboard.marker')</label>
                            <div class="input-icon">  
                                <span class="input-icon-addon">
                                <i class="fe fe-users"></i>
                                </span>
                                <input value="{{$honoraryboard->marker}}" type="number" class="form-control" id="marker" name="marker" placeholder="@lang('dashboard.marker')" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group select-image-from-media">
                                <label class="form-label">{{__('dashboard.students.image')}}</label>
                                <div class="input-group">
                                    <input id="select-thumbnail" value="{{$honoraryboard->image}}" type="text" name="image" class="form-control">
                                    <div class="btn-group ">
                                        <button data-type="image" type="button" data-id="select-thumbnail" class="btn btn-primary btn-sm" data-preview="select-thumbnail-preview"><i class="fe fe-folder-plus"></i></button>
                                        <button data-trigger="focus" data-placement="top" data-toggle="popover"  id="select-thumbnail-preview" class="disabled btn btn-primary btn-sm" type="button"  ><i class="fe fe-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">@lang('dashboard.year_un')</label>
                            <div class="input-icon">  
                                <span class="input-icon-addon">
                                <i class="fe fe-users"></i>
                                </span>
                                <input value="{{$honoraryboard->year}}" type="number" class="form-control" id="year" name="year" placeholder="@lang('dashboard.year_un')"  required>
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="interview_url" class="form-label">@lang('dashboard.honoraryboards.interview_url')</label>
                                <div class="input-icon">  
                                    <span class="input-icon-addon">
                                    <i class="fe fe-users"></i>
                                    </span>
                                    <input type="url" class="form-control" id="interview_url" name="interview_url" placeholder="@lang('dashboard.honoraryboards.interview_url')" value="{{$honoraryboard->interview_url}}">
                                </div>
                            </div>
                        <div class="form-group">
                            <div class="form-label">@lang('global.status')</div>
                            <label class="custom-switch">
                                <input @if($honoraryboard->is_active) {{'checked'}} @endif type="checkbox" name="is_active" id="is_active" class="custom-switch-input" value="1">
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