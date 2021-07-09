@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.top_header.profile') @stop

@section('content')

<div class="container profile">
  <div class="row">
    <div class="col-sm-12 col-md-8">
      <div class="card">
          <div class="card-status bg-blue"></div>
          <div class="card-header">
              <h3 class="card-title">@lang('global.personal_info')</h3>
            </div>
          <div class="card-body">
            <div class="row"> <!-- Start Row -->
              <div class="col-sm-12 col-md-6">
                  <label><strong>@lang("global.full_name") </strong> : {{auth()->user()->full_name}}</label>
              </div>
              <div class="col-sm-12 col-md-6">
                <label><strong>@lang("global.email") </strong> : {{auth()->user()->email}}</label>
              </div>
            </div> <!-- End Row -->

            <div class="row"> <!-- Start Row -->
              <div class="col-sm-12 col-md-6">
                  <label><strong>@lang("global.mobile_number") </strong> : {{!empty(auth()->user()->mobile_number)? auth()->user()->mobile_number : "-"}}</label>
              </div>
              <div class="col-sm-12 col-md-6">
                  <label><strong>@lang("global.telephone_number") </strong> : {{!empty(auth()->user()->telephone_number)? auth()->user()->telephone_number : "-"}}</label>
              </div>
            </div> <!-- End Row -->

            <div class="row"> <!-- Start Row -->
              <div class="col-sm-12 col-md-6">
                  <label><strong>@lang("global.date_of_birth") </strong> : {{!empty(auth()->user()->date_of_birth)? auth()->user()->date_of_birth : "-"}}</label>
              </div>
              <div class="col-sm-12 col-md-6">
                  <label><strong>@lang("global.sex") </strong> : {{!empty(auth()->user()->sex)? auth()->user()->sex : "-"}}</label>
              </div>
            </div> <!-- End Row -->

            <div class="row"> <!-- Start Row -->
              <div class="col-sm-12 col-md-6">
                  <label><strong>@lang("global.facebook_url") </strong> : {{!empty(auth()->user()->facebook_url)? auth()->user()->facebook_url : "-"}}</label>
              </div>
            </div> <!-- End Row -->
          </div>

      </div>
          <div class="card">
              <div class="card-status bg-blue"></div>
            <div class="card-header">
              <h3 class="card-title">@lang('global.reset_password')</h3>
            </div>
            <div class="card-body">
              <form class="ajax" method="POST" action="{{route("profile.reset_password")}}">
                @csrf
                  <div class="form-group">
                      <label for="oldPassword" class="form-label">@lang('global.old_password')</label>
                      <div class="input-icon">
                          <span class="input-icon-addon">
                            <i class="fe fe-git-branch"></i>
                          </span>
                          <input type="password" class="form-control" id="oldPassword" autocomplete="off" name="oldPassword" placeholder="@lang('global.old_password')"   required >
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="newPassword" class="form-label">@lang('global.new_password')</label>
                      <div class="input-icon">
                          <span class="input-icon-addon">
                            <i class="fe fe-git-branch"></i>
                          </span>
                          <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="@lang('global.new_password')"  required >
                      </div>
                  </div>
                  <button  type="submit" class="btn btn-primary btn-block mt-5">@lang('global.reset_password')</button>

              </form>
            </div>
          </div>
    </div>

    <div class="col-sm-12 col-md-4">
      <div class="card">
        <div class="card-status bg-blue"></div>
        <div class="avatar-profile">
            <img src="{{asset(auth()->user()->avatar)}}">
            <small class=" d-block mt-3">@if(\Lang::has("dashboard.roles.".auth()->user()->roles[0]->name)) {{__('dashboard.roles.'.auth()->user()->roles[0]->name)}} @else {{auth()->user()->role[0]->name}} @endif</small>
        </div>
        <div class="avatar-profile-info">
          <div class="card-body">
              <p><strong>@lang("global.logins"): </strong> <span>{{auth()->user()->logins}}</span>  </p>
              <p> <strong>@lang("global.last_login"): </strong> <span>{{(\Carbon\Carbon::parse(auth()->user()->last_login))}}</span> </p>
              <p><strong>@lang("global.last_ip"): </strong> <span>{{auth()->user()->last_ip}}</span></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
