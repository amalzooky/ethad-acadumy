@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.header.staff_create') @stop

@section('content')

<div class="container profile">
    <form action="{{route('staff.store')}}" method="post" class="ajax" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" id="username" name="username" placeholder="@lang('global.username')"  value="{{old('username')}}" required autofocus>
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
                                    <input type="email" class="form-control" id="email" name="email" placeholder="@lang('global.email')"  value="{{old('email')}}" required autocomplete="off">
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
                                    <input type="password" class="form-control" id="password" name="password" placeholder="@lang('global.password')"  required>
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
                                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="@lang('global.full_name')"  value="{{old('full_name')}}" required autocomplete="off">
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
                                    <input type="text" class="form-control" id="mobile_number" name="mobile_number"  value="{{old('mobile_number')}}" placeholder="@lang('global.mobile_number')"  required autocomplete="off">
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
                                    <input type="text" class="form-control" id="telephone_number" name="telephone_number" placeholder="@lang('global.telephone_number')"  value="{{old('telephone_number')}}" autocomplete="off">
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
                                        <option value="{{$city->id}}">{{$city->city_name_ar}}</option>
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
                                    <input type="text" class="date-picker form-control" id="date_of_birth" name="date_of_birth" placeholder="@lang('global.date_of_birth')"  value="{{old('date_of_birth')}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="sex" class="form-label">@lang('global.sex') <span class="form-required">*</span></label>
                                <select class="form-control custom-select sex" name="sex" required>
                                    <option></option>
                                    <option value="1">@lang('global.male')</option>
                                    <option value="2">@lang('global.female')</option>
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
                                    <input type="url" class="form-control" id="facebook_url" name="facebook_url" placeholder="@lang('global.facebook_url')"  value="{{old('facebook_url')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <div class="form-label">@lang('global.status')</div>
                                <label class="custom-switch">
                                    <input type="checkbox" name="is_active" id="is_active" class="custom-switch-input" value="1">
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
                        name="avatar" accept="image/*" required />
                </div>
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-9">
            <div class="card">
                <div class="card-status bg-blue"></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="role" class="form-label">@lang('dashboard.header.roles') <span class="form-required">*</span></label>
                                <select  class="form-control select2-roles" id="roles" name="role"  required>
                                    <option></option>
                                    @foreach($roles as $role)
                                    <option value="{{$role->name}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="row">
                <div class="col-sm-12 col-md-9">
                <div class="card">
                    <div class="card-status bg-blue"></div>
                    <div class="card-header">
                    <h3 class="card-title">المجموعات</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label for="groups" class="form-label">المجموعات</label>
                                    <select class="form-control custom-select groups" id="groups" name="groups[]" multiple>
                                        @foreach($groups as $group)
                                        <option value="{{$group->id}}">{{$group->name}}</option>
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
