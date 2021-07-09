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
                        <a href="{{ route('lectures.index') }}"><button class="btn btn-info pull-left">@lang('dashboard.header.lectures') <i class="fe fe-chevron-left" aria-hidden="true"></i></button></a>
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{route('lectures.store')}}" method="POST" class="ajax">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">@lang('dashboard.lecture.name')</label>
                            <div class="input-icon">  
                                <span class="input-icon-addon">
                                <i class="fe fe-book"></i>
                                </span>
                                <input type="text" class="form-control" id="name" name="name" placeholder="@lang('dashboard.lecture.name')"  value="{{old('name')}}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">@lang('dashboard.lecture.description')</label>
                            <textarea class="form-control" id="description" name="description" rows="5" placeholder="@lang('dashboard.lecture.description')..." required></textarea>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('dashboard.lecture.select_subject')</label>
                                    <select class="form-control custom-select lecture_subject" name="subject_id" required>
                                        <option></option>
                                        @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->name}} / {{$subject->major->name}} / {{$subject->semester}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('dashboard.lecture.select_teacher')</label>
                                    <select class="form-control custom-select lecture_teacher" name="teacher_id">
                                    </select>
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