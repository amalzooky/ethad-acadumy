@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.header.why_create') @stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">@lang('dashboard.header.why_create')</h3>
                    <div class="card-options">
                        <a href="{{ route('whyuse.index') }}"><button class="btn btn-info pull-left">@lang('dashboard.header.whyuse') <i class="fe fe-chevron-left" aria-hidden="true"></i></button></a>
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{route('whyuse.store')}}" method="POST" class="ajax">
                        @csrf
                        <div class="form-group">

                            <label class="form-label">{{__('dashboard.whyuse.image')}}</label>
                                                                <div class="input-group">
                                                                    <input id="" type="file" name="photo" class="form-control">

                                                                </div>


                            <label for="name" class="form-label">@lang('dashboard.whyuse.name')</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                <i class="fe fe-book"></i>
                                </span>
                                <input type="text" class="form-control" id="name" name="title" placeholder="@lang('dashboard.whyuse.name')"  value="{{old('name')}}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">@lang('dashboard.whyuse.description')</label>
                            <textarea class="form-control" id="description" name="text" rows="5" placeholder="@lang('dashboard.whyuse.description')..." required></textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-label">@lang('global.status')</div>
                            <label class="custom-switch">
                                <input type="checkbox" name="is_active" id="is_active" class="custom-switch-input" value="1">
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
