@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.header.virtual_classroom_create') @stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">إنشاء بث Webinar</h3>
                  </div>
                  <form action="{{route('webinar.store')}}" method="POST" class="ajax">
                        @csrf
                  <div class="card-body">    
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="title" class="form-label">@lang('dashboard.virtual_classroom.title') <span class="form-required">*</span></label>
                                    <div class="input-icon">  
                                        <span class="input-icon-addon">
                                        <i class="fe fe-book"></i>
                                        </span>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="@lang('dashboard.virtual_classroom.title')"  value="{{old('title')}}" required autofocus>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end row -->
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">المواد <span class="form-required">*</span></label>
                                    <select class="form-control custom-select virtual_classroom_subjects" name="subject_id" required>
                                        <option></option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{$subject->id}}">{{$subject->name}} / {{$subject->major->name}} / {{$subject->semester}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('dashboard.virtual_classroom.lecture') <span class="form-required">*</span></label>
                                    <select class="form-control custom-select virtual_classroom_lecture" name="lecture_id" required>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="start_time" class="form-label">@lang('dashboard.virtual_classroom.start_time') <span class="form-required">*</span></label>
                                    <div class="input-icon">  
                                        <span class="input-icon-addon">
                                        <i class="fe fe-calendar"></i>
                                        </span>
                                        <input type="text" class="datetime-picker form-control" id="start_time" name="start_time" placeholder="@lang('dashboard.virtual_classroom.start_time')"  value="{{old('start_time')}}" required>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="webinar_end_time" class="form-label">@lang('dashboard.virtual_classroom.webinar_end_time') <span class="form-required">*</span></label>
                                    <div class="input-icon">  
                                        <span class="input-icon-addon">
                                        <i class="fe fe-calendar"></i>
                                        </span>
                                        <input type="text" class="datetime-picker form-control" id="webinar_end_time" name="webinar_end_time" placeholder="@lang('dashboard.virtual_classroom.webinar_end_time')">
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div><!-- end row -->
                     <div class="row">
                            <div class="col">
                                <div class="form-group">
                                        <label for="webinar_description" class="form-label">@lang('dashboard.virtual_classroom.webinar_description')<span class="form-required">*</span></label>
                                        <textarea class="form-control" id="webinar_description" name="webinar_description" rows="5" placeholder="@lang('dashboard.virtual_classroom.webinar_description')..." required></textarea>
                                </div>
                            </div>
                        </div><!-- end row -->
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">@lang('dashboard.virtual_classroom.webinar_account')<span class="form-required">*</span></label>
                                    <select class="form-control custom-select webinar_account" name="webinar_account"  required>
                                        <option value="webinar-1">abed.shuqair@gmail.com</option>
                                        <option value="webinar-2">abed.abu.rateb@gmail.com</option>
                                        <option value="webinar-3">abedalrahmanshuqair1978@gmail.com</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button  type="submit" class="btn btn-primary btn-block mt-5">@lang('global.save')</button>
                            </div>
                        </div>
                  </div><!-- end card body -->
                  </form>
                </div>
            </div>
        </div> <!-- end row -->
    </div>
@endsection
