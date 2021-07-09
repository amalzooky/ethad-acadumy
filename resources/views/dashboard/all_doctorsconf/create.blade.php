@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.latestnews.create') @stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-status bg-blue"></div>
                    <div class="card-header">
                        <h3 class="card-title">انشاء دكتور</h3>
                        <div class="card-options">
                            <a href="{{ route('allconference.index') }}"><button class="btn btn-info pull-left">المؤتمرات <i class="fe fe-chevron-left" aria-hidden="true"></i></button></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" action="{{route('alldoctconf.store')}}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row">


                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">أسم الدكتور</label>
                                        <input type="text" class="form-control" id="name" name="doct_name" placeholder="اسم المؤتمر"  required autofocus>

                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="active_date" class="form-label">الوظيفه </label>

                                            <input class="form-control" style="width: 30%;" type="text" name="doct_job" placeholder="الوظيفه">
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
