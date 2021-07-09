@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.teacher.teacher_edit') @stop

@section('content')

<div class="container profile">
    <form action="{{route('teachers.update', $teacher->id)}}" method="post" class="ajax" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="row">
            <div class="col-sm-12 col-md-9">
            <div class="card">
                <div class="card-status bg-blue"></div>
                <div class="card-header">
                    <h3 class="card-title">@lang('dashboard.teacher.personal_info')</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="username" class="form-label">@lang('global.username') <span class="form-required">*</span></label>
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                    <i class="fe fe-user"></i>
                                    </span>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="@lang('global.username')"  value="{{$teacher->user->username}}" required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-label">@lang('global.email') <span class="form-required">*</span></label>
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                    <i class="fe fe-at-sign"></i>
                                    </span>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="@lang('global.email')"  value="{{$teacher->user->email}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="password" class="form-label">@lang('global.password') <span class="form-required">*</span></label>
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                    <i class="fe fe-unlock"></i>
                                    </span>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="@lang('global.password')">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="full_name" class="form-label">@lang('global.full_name') <span class="form-required">*</span></label>
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                    <i class="fe fe-user"></i>
                                    </span>
                                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="@lang('global.full_name')"  value="{{$teacher->user->full_name}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="mobile_number" class="form-label">@lang('global.mobile_number') <span class="form-required">*</span></label>
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                    <i class="fe fe-phone"></i>
                                    </span>
                                    <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="@lang('global.mobile_number')" value="{{$teacher->user->mobile_number}}"  required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="telephone_number" class="form-label">@lang('global.telephone_number')</label>
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                    <i class="fe fe-phone"></i>
                                    </span>
                                    <input type="text" class="form-control" id="telephone_number" name="telephone_number" placeholder="@lang('global.telephone_number')"  value="{{$teacher->user->telephone_number}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="city" class="form-label">@lang('global.city') <span class="form-required">*</span></label>
                                    <select class="form-control custom-select cities" name="city_id" required>
                                        <option></option>
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city->governorate_name_ar ?? ''}}</option>

                                            <option value="{{$city->id}}" {{$city->id === $teacher->user->city_id ? 'selected' : ''}}>{{$city->governorate_name_ar}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="date_of_birth" class="form-label">@lang('global.date_of_birth') <span class="form-required">*</span></label>
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                    <i class="fe fe-calendar"></i>
                                    </span>
                                    <input type="text" class="date-picker form-control" id="date_of_birth" name="date_of_birth" placeholder="@lang('global.date_of_birth')"  value="{{$teacher->user->date_of_birth}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="sex" class="form-label">@lang('global.sex') <span class="form-required">*</span></label>
                                <select class="form-control custom-select sex" name="sex" required>
                                    <option value="1" {{$teacher->user->getOriginal('sex') == 1 ? 'selected' : ''}}>@lang('global.male')</option>
                                    <option value="2" {{$teacher->user->getOriginal('sex') == 2 ? 'selected' : ''}}>@lang('global.female')</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="facebook_url" class="form-label">@lang('global.facebook_url')</label>
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                    <i class="fe fe-facebook"></i>
                                    </span>
                                    <input type="url" class="form-control" id="facebook_url" name="facebook_url" placeholder="@lang('global.facebook_url')"  value="{{$teacher->user->facebook_url}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <div class="form-label">@lang('global.status')</div>
                                <label class="custom-switch">
                                    <input type="checkbox" name="is_active" id="is_active" class="custom-switch-input" value="1" {{$teacher->user->is_active === 1 ? 'checked' : ''}}>
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="col-sm-12 col-md-3">
            <div class="card">
                <div class="card-status bg-blue"></div>
                <div class="avatar-profile teacher">
                    <img   src="{{asset('dashboard/assets/imgs/avatar-default.jpg')}}">
                        <input  class="file-upload-avatar" type="file"
                        name="avatar" accept="image/*" />
                </div>
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-9">
            <div class="card">
                <div class="card-status bg-blue"></div>
                <div class="card-header">
                <h3 class="card-title">@lang('dashboard.teacher.academic_info')</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="job_title" class="form-label">الدور الوظيفي <span class="form-required">*</span></label>
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                    <i class="fe fe-user"></i>
                                    </span>
                                    <input type="text" class="form-control" id="job_title" name="job_title" placeholder="الدور الوظيفي" required value="{{$teacher->job_title}}" >
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="subjects" class="form-label">@lang('dashboard.teacher.teacher_subjects') <span class="form-required">*</span></label>
                                <select class="form-control custom-select teacher_subjects" id="subjects" name="subjects[]" multiple required>

                                    @foreach($subjects as $subject)
                                    <option value="{{$subject->id}}" {{in_array($subject->id, $teacher->subjects->pluck('id')->toArray()) ? 'selected' : ''}}>{{$subject->name ?? ""}} / {{$subject->major->name ?? ""}} / {{$subject->semester}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button  type="submit" class="btn btn-primary btn-block mt-5">@lang('global.save')</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </form>
</div><!-- end container -->
@stop
