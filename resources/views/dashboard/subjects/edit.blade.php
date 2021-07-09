@extends('dashboard.layouts.base')
@section('title') @lang('dashboard.subject.edit') @stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">@lang('dashboard.subject.edit')</h3>
                    <div class="card-options">
                        <a href="{{ route('subjects.index') }}"><button class="btn btn-info pull-left">@lang('dashboard.header.subjects') <i class="fe fe-chevron-left" aria-hidden="true"></i></button></a>
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{route('subjects.update', $subject->id)}}" method="POST" class="ajax">
                        @method('patch')
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">@lang('dashboard.subject.name')</label>
                                    <div class="input-icon">  
                                        <span class="input-icon-addon">
                                        <i class="fe fe-book"></i>
                                        </span>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="@lang('dashboard.subject.name')"  value="{{$subject->name}}" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('dashboard.subject.majors')</label>
                                    <select class="form-control custom-select majors" name="major_id" required>
                                        <option></option>
                                        @foreach($majors as $major)
                                        <option value="{{$major->id}}" {{$subject->major->id === $major->id ? 'selected' : ''}}>{{$major->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('dashboard.subject.year')</label>
                                    <select class="form-control custom-select semester" name="academic_year_id" required>
                                        @foreach ($years as $year)
                                            <option value="{{$year->id}}">{{$year->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('dashboard.subject.semester')</label>
                                    <select class="form-control custom-select semester" name="semester" required>
                                        <option value="1" {{$subject->semester == 1 ? 'selected' : ''}}>@lang('dashboard.subject.first_semester')</option>
                                        <option value="2" {{$subject->semester == 2 ? 'selected' : ''}}>@lang('dashboard.subject.second_semester')</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">@lang('dashboard.subject.description')</label>
                            <textarea class="form-control" id="description" name="description" rows="5" placeholder="@lang('dashboard.subject.description')..." required>{{$subject->description}}</textarea>
                        </div>

                        <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                        <label>الاحد </label>
                                        <input class="form-control" name="sunday" value="{{isset($subject->subjectDate) ? $subject->subjectDate->sunday:'' }}">
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <label>الاثنين </label>
                                        <input class="form-control" name="monday" value="{{isset($subject->subjectDate) ? $subject->subjectDate->monday:'' }}">
                                    </div>
                                        
                                    <div class="col-sm-12 col-md-3">
                                        <label>الثلاثاء </label>
                                        <input class="form-control" name="tuesday" value="{{isset($subject->subjectDate) ? $subject->subjectDate->tuesday:'' }}">
                                    </div>
    
                                    <div class="col-sm-12 col-md-3">
                                        <label>الاربعاء </label>
                                        <input class="form-control" name="wednesday" value="{{isset($subject->subjectDate) ? $subject->subjectDate->wednesday:'' }}">
                                    </div>
    
                                    <div class="col-sm-12 col-md-3">
                                        <label>الخميس </label>
                                        <input class="form-control" name="thursday" value="{{isset($subject->subjectDate) ? $subject->subjectDate->thursday:'' }}">
                                    </div>
                                        
                                    <div class="col-sm-12 col-md-3">
                                        <label>الجمعه </label>
                                        <input class="form-control" name="friday" value="{{isset($subject->subjectDate) ? $subject->subjectDate->friday:'' }}">
                                    </div>
    
                                    <div class="col-sm-12 col-md-3">
                                        <label>السبت </label>
                                        <input class="form-control" name="saturday" value="{{isset($subject->subjectDate) ? $subject->subjectDate->saturday:'' }}">
                                    </div>                                
                                </div>
                            </div>

                        <div class="form-group">
                            <div class="form-label">@lang('global.status')</div>
                            <label class="custom-switch">
                                <input type="checkbox" name="is_active" id="is_active" class="custom-switch-input" {{$subject->is_active ? 'checked' : ''}} value="1">
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