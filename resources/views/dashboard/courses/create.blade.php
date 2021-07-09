@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.header.lecture_create') @stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">@lang('dashboard.header.lecture_create')</h3>
                    <div class="card-options">
                        <a href="{{ route('courses.index') }}"><button class="btn btn-info pull-left">@lang('dashboard.header.courses') <i class="fe fe-chevron-left" aria-hidden="true"></i></button></a>
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{route('courses.store')}}" method="POST" class="ajax">
                        @csrf
                        <div class="form-group">

                            <label class="form-label">{{__('dashboard.course.image')}}</label>
                                                                <div class="input-group">
                                                                    <input id="" type="file" name="photo" class="form-control">

                                                                </div>


                            <label for="name" class="form-label">@lang('dashboard.course.name')</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                <i class="fe fe-book"></i>
                                </span>
                                <input type="text" class="form-control" id="name" name="cour_name" placeholder="@lang('dashboard.course.name')"  value="{{old('name')}}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">@lang('dashboard.course.description')</label>
                            <textarea class="form-control" id="description" name="cour_text" rows="5" placeholder="@lang('dashboard.course.description')..." required></textarea>
                        </div>
                        <div class="row">


                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">المده</label>
                                    <input type="text" class="form-control" id="name" name="cour_duration" placeholder="@lang('dashboard.course.durat')"  value="{{old('name')}}" required autofocus>

                                </div>
                            </div>   <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">الوقت</label>
                                    <input type="text" class="form-control" id="name" name="cout_time" placeholder="@lang('dashboard.course.time')"  value="{{old('name')}}" required autofocus>

                                </div>
                            </div>   <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">السعر</label>
                                    <input type="text" class="form-control" id="name" name="price" placeholder="@lang('dashboard.course.price')"  value="{{old('name')}}" required autofocus>

                                </div>
                            </div>
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
