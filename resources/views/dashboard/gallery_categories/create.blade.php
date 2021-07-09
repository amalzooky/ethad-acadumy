@extends('dashboard.layouts.base')

@section('title') إضافة تصنيف @stop

@section('content')
    <div class="container profile">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">اضافة تصنيف</h3>
                    <div class="card-options">
                        <a href="{{ route('gallery-categories.index') }}"><button class="btn btn-info pull-left">التصنيفات <i class="fe fe-chevron-left" aria-hidden="true"></i></button></a>
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{route('gallery-categories.store')}}" method="POST" class="ajax" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="form-label">إسم التصنيف</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="إسم التصنيف"  required autofocus>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="date" class="form-label">وصف المناسبة</label>
                                    <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date" class="form-label">تاريخ المناسبة</label>
                                    <input type="date" class="form-control" id="date" name="date" placeholder="تاريخ المناسبة"  required >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location" class="form-label">مدينة المناسبة</label>
                                    <input type="text" class="form-control" id="location" name="location" placeholder="مدينة المناسبة"  required >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="form-group select-image-from-media">
                                        <label class="form-label">صورة الغلاف</label>
                                        <div class="input-group">
                                            <input  id="" type="file" name="image" class="form-control">

                                        </div>
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
