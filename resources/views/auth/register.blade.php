@extends('layouts.frontend')

@section('title') @lang('frontend.new_account') @endsection

@section('content')
<div class="page">
    <div class="page-single">
      <div class="container">
        <div class="row">
          <div class="col  mx-auto" style="">
            <div class="text-center mb-6">
              <img src="./demo/brand/tabler.svg" class="h-6" alt="">
            </div>
            <form  class="card " method="POST" action="{{ route('register') }}">
                @csrf
              <div class="card-body ">
                <div class="card-title">@lang("frontend.new_account")</div>
                @if(session()->has('alert-success'))
                <div class="alert alert-success text-center">
                  <strong>
                    {{session()->get('alert-success')}}
                  </strong>
                  <div>
                    <a href="{{route('front.contact')}}"><strong>@lang('frontend.contact')</strong></a>
                  </div>
                </div>
                @endif
                <div class="row">
                  <div class="col-12 col-lg-6">
{{--                      <div class="form-group">--}}
{{--                          <label class="form-label" for="username">صوره الكارنيه <span class="form-required">*</span></label>--}}
{{--                          <input name="card_stu" type="file" id="username" class="form-control{{ $errors->has('card_stu') ? ' is-invalid' : '' }}" value="{{ old('username') }}" required autofocus placeholder="@lang("frontend.username")">--}}
{{--                          @if ($errors->has('card_stu'))--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $errors->first('card_stu') }}</strong>--}}
{{--                            </span>--}}
{{--                          @endif--}}
{{--                        </div>--}}
                  </div>
                    <div class="col-12 col-lg-6">
                      <div class="form-group">
                          <label class="form-label" for="username">@lang("frontend.username") <span class="form-required">*</span></label>
                          <input name="username" type="text" id="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ old('username') }}" required autofocus placeholder="@lang("frontend.username")">
                          @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                          @endif
                        </div>
                  </div>
                  <div class="col-12 col-lg-6">
                      <div class="form-group">
                          <label class="form-label" for="full_name">@lang("global.full_name") <span class="form-required">*</span></label>
                          <input name="full_name" type="text" id="full_name" class="form-control{{ $errors->has('full_name') ? ' is-invalid' : '' }}" value="{{ old('full_name') }}" required autofocus placeholder="@lang("global.full_name")">
                          @if ($errors->has('full_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('full_name') }}</strong>
                            </span>
                          @endif
                        </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-lg-6">
                      <div class="form-group">
                          <label class="form-label" for="password">@lang("frontend.password") <span class="form-required">*</span></label>
                          <input name="password" type="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                          @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                          @endif
                        </div>
                  </div>
                  <div class="col-12 col-lg-6">
                      <div class="form-group">
                          <label class="form-label" for="email">@lang("frontend.email") <span class="form-required">*</span></label>
                          <input name="email" type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required placeholder="@lang("frontend.email")" autocomplete="off">
                          @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                          @endif
                        </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-lg-6">
                      <div class="form-group">
                          <label class="form-label" for="mobile_number">@lang("global.mobile_number") <span class="form-required">*</span></label>
                          <input name="mobile_number" type="text" id="mobile_number" class="form-control{{ $errors->has('mobile_number') ? ' is-invalid' : '' }}" value="{{ old('mobile_number') }}" required placeholder="@lang("global.mobile_number")" autocomplete="off">
                          @if ($errors->has('mobile_number'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('mobile_number') }}</strong>
                            </span>
                          @endif
                        </div>
                  </div>
                  <div class="col-12 col-lg-6">
                      <div class="form-group">
                          <label class="form-label" for="telephone_number">@lang("global.telephone_number")</label>
                          <input name="telephone_number" type="text" id="telephone_number" class="form-control{{ $errors->has('telephone_number') ? ' is-invalid' : '' }}" value="{{ old('telephone_number') }}" placeholder="@lang("global.telephone_number")" autocomplete="off">
                          @if ($errors->has('telephone_number'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('telephone_number') }}</strong>
                            </span>
                          @endif
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-lg-6">
                      <div class="form-group">
                          <label for="city" class="form-label">@lang('global.city') <span class="form-required">*</span></label>
                          <select class="form-control custom-select cities" name="city_id" required>
                              @foreach($cities as $city)
                              <option value="{{$city->id}}">{{$city->governorate_name_ar}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-12 col-lg-6">
                      <div class="form-group">
                          <label for="sex" class="form-label">@lang('global.sex') <span class="form-required">*</span></label>
                          <select class="form-control custom-select sex" name="sex" required>
                              <option value="1">@lang('global.male')</option>
                              <option value="2">@lang('global.female')</option>
                          </select>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-lg-6">
                      <div class="form-group">
                          <label class="form-label">@lang('dashboard.subject.majors') <span class="form-required">*</span></label>
                          <select class="form-control custom-select majors-register" name="major_id" id='sel_major' required>
                              <option></option>
                              @foreach($majors as $major)
                              <option value="{{$major->id}}">{{$major->name}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-12 col-lg-6">
                      <div class="form-group">
                          <label for="subject_id" class="form-label">@lang('frontend.select_subjects') <span class="form-required">*</span></label>
                          <select class="form-control subjects" id="subject_id"  name="subjects[]" multiple="multiple" required>

                          </select>
                      </div>
                  </div>
                </div>
                <div class="form-footer">
                  <button type="submit" class="btn btn-primary btn-block">@lang("frontend.new_account")</button>
                </div>
              </div>
            </form>
            <div class="text-center text-muted">
                    هل لديك حساب ؟ <a href="{{ route('login') }}">@lang("frontend.login")</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        $('#sel_div2').click(function() { return false; }); // Adds another click event
        $('#sel_major').change(function(){
         $('#subject_id').empty();

    var id = $( "#sel_major" ).val();
    console.log(id);
    $.ajax({
url: 'register/subjects/'+id,
type: 'get',
dataType: 'json',
success: function(response){
  var len = 0;
  if(response['subjects'] != null){
    len = response['subjects'].length;
  }
  if(len > 0){
    // Read data and create <option >
    for(var i=0; i<len; i++){
      var id = response['subjects'][i].id;
      var name = response['subjects'][i].name;
      var option = "<option value='"+id+"'>"+name+"</option>";
      $("#subject_id").append(option);
     //  $('#sub').append(sub);
    }
  }
}
}); //end ajax
});//end on change
    });
</script>
@endsection
