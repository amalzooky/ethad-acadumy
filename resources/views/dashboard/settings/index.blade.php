
@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.top_header.settings') @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">@lang('dashboard.settings.site_settings')</h3>
                  </div>
                  <div class="card-body">
                    <form action="{{route('settings.update')}}" method="POST" class="ajax">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="phone" class="form-label">@lang('dashboard.settings.phone')</label>
                                    <div class="input-icon">  
                                        <span class="input-icon-addon">
                                        <i class="fe fe-phone"></i>
                                        </span>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="@lang('dashboard.settings.phone')" value="{{settings()->phone}}" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">@lang('global.email')</label>
                                    <div class="input-icon">  
                                        <span class="input-icon-addon">
                                        <i class="fe fe-at-sign"></i>
                                        </span>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="@lang('global.email')" value="{{settings()->email}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="location" class="form-label">@lang('global.location')</label>
                                    <div class="input-icon">  
                                        <span class="input-icon-addon">
                                        <i class="fe fe-map-pin"></i>
                                        </span>
                                        <input type="text" class="form-control" id="location" name="location" placeholder="@lang('global.location')" value="{{settings()->location}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="facebook_url" class="form-label">@lang('global.facebook_url')</label>
                                    <div class="input-icon">  
                                        <span class="input-icon-addon">
                                        <i class="fe fe-facebook"></i>
                                        </span>
                                        <input type="url" class="form-control" id="facebook_url" name="facebook_url" placeholder="@lang('global.facebook_url')" value="{{settings()->facebook_url}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="youtube_url" class="form-label">@lang('global.youtube_url')</label>
                                    <div class="input-icon">  
                                        <span class="input-icon-addon">
                                        <i class="fe fe-film"></i>
                                        </span>
                                        <input type="url" class="form-control" id="youtube_url" name="youtube_url" placeholder="@lang('global.youtube_url')" value="{{settings()->youtube_url}}" required>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                    <div class="form-group">
                                        <label for="about_us" class="form-label">@lang('global.about_us')</label>
                                        <textarea class="form-control" id="about_us" name="about_us" rows="5" placeholder="@lang('global.about_us')..." required>{{settings()->about_us}}</textarea>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <div class="form-label">التوقيت</div>
                                    <div>
                                      <label class="form-check">
                                        <input class="form-check-input" type="radio" name="time" value="2"  {{settings()->time == 2 ? 'checked' : ''}}>
                                        <span class="form-check-label">شتوي</span>
                                      </label>
                                      <label class="form-check">
                                        <input class="form-check-input" type="radio" name="time" value="1" {{settings()->time == 1 ? 'checked' : ''}}>
                                        <span class="form-check-label">صيفي</span>
                                      </label>
                                    </div>
                                  </div>
                            </div>
                        </div>
                        <button  type="submit" class="btn btn-primary btn-block mt-5">@lang('global.save')</button>
                    </form>
                  </div><!-- end card body -->
                </div>
            </div>
        </div> <!-- end row -->
    </div>
@endsection