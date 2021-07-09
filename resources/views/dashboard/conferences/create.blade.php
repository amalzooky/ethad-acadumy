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
                        <form action="{{route('conference.store')}}" method="POST" class="card" enctype="multipart/form-data">
                            @csrf
{{--                        <form   method="POST" action="{{ route('front.conference.store') }}">--}}
                            @csrf
                            <div class="card-body ">
                                <div class="card-title">التسجيل في المؤتمر</div>
                                @if(session('alert-success'))
                                    <div class="alert alert-success text-center">
                                        <strong>
                                            {{session('alert-success')}}
                                        </strong>
                                        <div>
                                            <a href="{{route('front.contact')}}"><strong>@lang('frontend.contact')</strong></a>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="full_name">@lang("global.full_name") <span class="form-required">*</span></label>
                                            <input name="name_conf" type="text" id="name_conf" class="form-control" value="{{ old('name_conf') }}" required autofocus placeholder="@lang("global.full_name")">

                                            @if (session('name_conf'))
                                                <span class="invalid-feedback" role="alert">
                                <strong>{{session('name_conf') }}</strong>
                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="email">@lang("frontend.email") <span class="form-required">*</span></label>
                                            <input name="email_conf" type="email" id="email_conf" class="form-control " value="{{ old('email_conf') }}" required placeholder="@lang("frontend.email")" autocomplete="off">
                                            @if (session('email_conf'))
                                                <span class="invalid-feedback" role="alert">
                                <strong>{{ session('email_conf') }}</strong>
                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="telephone_number">رقم الجوال</label>
                                            <input name="tel_conf" type="text" id="tel_conf" class="form-control" value="{{ old('tel_conf') }}" placeholder="رقم الجوال" autocomplete="off">
                                            @if (session('tel_conf'))
                                                <span class="invalid-feedback" role="alert">
                                <strong>{{('tel_conf') }}</strong>
                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label for="city" class="form-label">المحافظة <span class="form-required">*</span></label>
                                            <select class="form-control custom-select" name="cover_conf" required>
                                                @foreach($cities as $city)
                                                    <option value="{{$city->id}}">{{$city->governorate_name_ar}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="adress_conf">العنوان") <span class="form-required">*</span></label>
                                            <input name="adress_conf" type="text" id="adress_conf" class="form-control" value="{{ old('adress_conf') }}" required placeholder="العنوان" autocomplete="off">
                                            @if (session('adress_conf'))
                                                <span class="invalid-feedback" role="alert">
                                <strong>{{('adress_conf') }}</strong>
                            </span>
                                            @endif
                                        </div>
                                    </div>

   <div class="col-12 col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="job_conf	">الوظيفة") <span class="form-required">*</span></label>
                                            <input name="job_conf" type="text" id="job_conf	" class="form-control" value="{{ old('job_conf') }}" required placeholder="الوظيفة" autocomplete="off">
                                            @if (session('job_conf'))
                                                <span class="invalid-feedback" role="alert">
                                <strong>{{session('job_conf') }}</strong>
                            </span>
                                            @endif
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


                                </div>
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary btn-block">التسجيل في المؤتمر</button>
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
