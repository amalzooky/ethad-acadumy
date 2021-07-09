@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.latestnews.create') @stop

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard/assets/js/vendors/froala/css/froala_editor.pkgd.min.css')}}" rel="stylesheet">
<link href="{{asset('dashboard/assets/js/vendors/froala/css/froala_style.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">@lang('dashboard.certificate.create')</h3>
                    <div class="card-options">
                        <a href="{{ route('certificate.index') }}"><button class="btn btn-info pull-left">@lang('dashboard.header.latestnews') <i class="fe fe-chevron-left" aria-hidden="true"></i></button></a>
                    </div>
                  </div>
                  <div class="card-body">
                      <form action="{{route('certificate.store')}}" method="POST" enctype="multipart/form-data">
                          {{csrf_field()}}

<div class="row">
    <div class="col-lg-3">
        <div class="form-group">
            <label for="name" class="form-label">أسم الطالب</label>
            <div class="input-icon">
                                <span class="input-icon-addon">
                                <i class="fe fe-book"></i>
                                </span>
                <input  type="text" class="form-control" id="title" name="namestudent" placeholder="اسم الطالب"  value="{{old('namestudent')}}" >
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label for="name" class="form-label">ماده الطالب</label>
            <div class="input-icon">
                                <span class="input-icon-addon">
                                <i class="fe fe-book"></i>
                                </span>
                <input  type="text" class="form-control" id="title" name="student_subj" placeholder="ماده الطالب"  value="{{old('student_subj')}}" >
            </div>
        </div>
    </div>
     <div class="col-lg-3">
        <div class="form-group">
            <label for="name" class="form-label">أسم الشهاده</label>
            <div class="input-icon">
                                <span class="input-icon-addon">
                                <i class="fe fe-book"></i>
                                </span>
                <input  type="text" class="form-control" id="title" name="name_certificat" placeholder="اسم الشهاده"  value="{{old('student_subj')}}" >
            </div>
        </div>
    </div>
      <div class="col-lg-3">
         <div class="form-group">
            <label for="name" class="form-label">محتوي الشهاده</label>
            <div class="input-icon">
                                <span class="input-icon-addon">
                                <i class="fe fe-book"></i>
                                </span>
                <input  type="text" class="form-control" id="title" name="cont_certificate" placeholder="محتوي الشهاده"  value="{{old('student_subj')}}" >
            </div>
             </div>
    </div>

    <div class="col-lg-3">
        <div class="form-group">
            <div class="form-group select-image-from-media">
                <label class="form-label">لوجو الاكاديمية</label>
                <div class="input-group">
                    <input   type="file" name="logowt" class="form-control">

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="form-group">
            <div class="form-group select-image-from-media">
                <label class="form-label"> كارنيه او صوره الطالب</label>
                <div class="input-group">
                    <input   type="file" name="cart_stud" class="form-control">

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="form-group">
            <div class="form-group select-image-from-media">
                <label class="form-label">خلفية الاكاديمية</label>
                <div class="input-group">
                    <input   type="file" name="backgrond" class="form-control">

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <div class="form-group select-image-from-media">
                <label class="form-label">لوجو الاكاديمية الاروبيه</label>
                <div class="input-group">
                    <input  type="file" name="logoero" class="form-control">

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <div class="form-group select-image-from-media">
                <label class="form-label">الختم الاول</label>
                <div class="input-group">
                    <input   type="file" name="seg1" class="form-control">

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="form-group">
            <div class="form-group select-image-from-media">
                <label class="form-label">الختم التاني</label>
                <div class="input-group">
                    <input   type="file" name="seg2" class="form-control">

                </div>
            </div>
        </div>
    </div> 
        <div class="col-lg-3">
            <div class="form-group">
            <div class="form-group select-image-from-media">
                <label class="form-label">الدكتور1 </label>
                <div class="input-group">
                    <input   type="file" name="pict1" class="form-control">

                </div>
            </div>
            </div>
        </div>
    <div class="col-lg-3">
            <div class="form-group">
            <div class="form-group select-image-from-media">
                <label class="form-label">اسم الدكتور 1</label>
                <div class="input-group">
                    <input   type="text" name="name1" class="form-control">

                </div>
            </div>
        </div>
    </div> 

    <div class="col-lg-3">
        <div class="form-group">
            <div class="form-group select-image-from-media">
                <label class="form-label">الدكتور 2</label>
                <div class="input-group">
                    <input   type="file" name="pict2" class="form-control">

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
            <div class="form-group">
            <div class="form-group select-image-from-media">
                <label class="form-label">اسم الدكتور 2</label>
                <div class="input-group">
                    <input   type="text" name="name2" class="form-control">

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="form-group">
            <div class="form-group select-image-from-media">
                <label class="form-label">الدكتور 3 </label>
                <div class="input-group">
                    <input   type="file" name="pict3" class="form-control">

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
            <div class="form-group">
            <div class="form-group select-image-from-media">
                <label class="form-label">اسم الدكتور 3</label>
                <div class="input-group">
                    <input   type="text" name="name3" class="form-control">

                </div>
            </div>
        </div>
    </div>  

    <div class="col-lg-3">
        <div class="form-group">
            <div class="form-group select-image-from-media">
                <label class="form-label">الدكتور4 </label>
                <div class="input-group">
                    <input   type="file" name="pict4" class="form-control">

                </div>
            </div>
        </div>

    </div>    
    <div class="col-lg-3">
            <div class="form-group">
            <div class="form-group select-image-from-media">
                <label class="form-label">اسم الدكتور 4</label>
                <div class="input-group">
                    <input   type="text" name="name4" class="form-control">

                </div>
            </div>
        </div>
    </div> 
    <div class="col-lg-3">
        <div class="form-group">
            <div class="form-group select-image-from-media">
                <label class="form-label">الدكتور 5</label>
                <div class="input-group">
                    <input   type="file" name="pict5" class="form-control">

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
            <div class="form-group">
            <div class="form-group select-image-from-media">
                <label class="form-label">اسم الدكتور 5</label>
                <div class="input-group">
                    <input   type="text" name="name5" class="form-control">

                </div>
            </div>
        </div>
    </div> 
    <div class="col-lg-3">
        <div class="form-group">
            <div class="form-group select-image-from-media">
                <label class="form-label">الدكتور 6</label>
                <div class="input-group">
                    <input   type="file" name="pict6" class="form-control">

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
            <div class="form-group">
            <div class="form-group select-image-from-media">
                <label class="form-label">اسم الدكتور 6</label>
                <div class="input-group">
                    <input   type="text" name="name6" class="form-control">

                </div>
            </div>
        </div>
    </div>


</div>



{{--                        <div class="form-group">--}}
{{--                            <div class="form-label">@lang('global.status')</div>--}}
{{--                            <label class="custom-switch">--}}
{{--                                <input type="checkbox" name="is_active" id="is_active" class="custom-switch-input" value="1">--}}
{{--                                <span class="custom-switch-indicator"></span>--}}
{{--                            </label>--}}
{{--                        </div>--}}
                        <button  type="submit" class="btn btn-primary btn-block mt-5">@lang('global.save')</button>
                    </form>
                  </div><!-- end card body -->
                </div>
            </div>
        </div> <!-- end row -->
    </div>
@endsection


