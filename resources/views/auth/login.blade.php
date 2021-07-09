@extends('layouts.frontend')

@section('title') @lang('front.login') @endsection

@section('content')
<div class="page">
    <div class="page-single">
      <div class="container">
        <div class="row">
          <div class="col col-login mx-auto">
            <div class="text-center mb-6">
              {{-- <img src="{{asset('front/images/logo/156725809563154226.png')}}" style="height: 8rem !important;" alt=""> --}}
              <h3>الاكاديمية</h3>
            </div>
            <form  class="card " method="POST" action="{{ route('login') }}">
                @csrf
              <div class="card-body p-6">
                <div class="card-title">@lang("frontend.login")</div>
                <div class="form-group">
                  <label class="form-label">@lang("frontend.email")/@lang("frontend.username")</label>
                  <input name="username" type="text"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('username') }}" required autofocus placeholder="@lang("front.email")/@lang("front.username")" >
                  @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group">
                  {{-- <label class="form-label">
                    @lang("front.password")
                    <a href="{{ route('password.request') }}" class="float-right small">@lang("front.I_forgot_password")</a>
                  </label> --}}
                  <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="@lang("front.password")">
                  @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
                </div>
                <div class="form-group">
                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember" value="{{ old('remember') ? 'checked' : '' }}" class="custom-control-input" />
                    <span class="custom-control-label">@lang("frontend.remember_me")</span>
                  </label>
                </div>
                <div class="form-footer">
                  <button type="submit" class="btn btn-primary btn-block">@lang("frontend.login")</button>
                </div>
              </div>
            </form>
            <div class="text-center text-muted">
             @lang("frontend.do_not_have_account_yet") <a href="{{ route('register') }}">@lang("frontend.register")</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
