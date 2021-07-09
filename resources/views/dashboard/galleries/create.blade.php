@extends('dashboard.layouts.base')

@section('title') إضافة صورة/فيديو @stop

@section('content')
    <div class="container profile">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">اضافة صورة/فيديو</h3>
                    <div class="card-options">
                        <a href="{{ route('galleries.index') }}"><button class="btn btn-info pull-left">معرض الصور <i class="fe fe-chevron-left" aria-hidden="true"></i></button></a>
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{route('galleries.store')}}" method="POST" class="ajax" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">التصنيف</label>
                                    <select class="form-control custom-select galleries_category" name="category_id" required>

                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">نوع الميديا</label>
                                    <select class="form-control custom-select media_type_select" name="media_type" required>
                                        <option></option>
                                        <option value="1">صورة</option>
                                        <option value="2">فيديو</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="image_type_warpper">
                            <div class="col-12">
                                    <div class="form-group">
                                            <div class="form-group select-image-from-media">
                                                <label class="form-label">الصورة</label>
                                                <div class="input-group">
                                                    <input id="" type="file" name="image_type_input" class="form-control">

                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div>

                        <div class="row" id="video_type_warpper">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="image" class="form-label">رابط يوتيوب للفيديو</label>
                                    <div class="input-icon">
                                        <input type="url" class="form-control" id="image" name="video_type_input" placeholder="رابط يوتيوب للفيديو" >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                    <div class="form-group">
                                            <div class="form-label">@lang('global.status')</div>
                                            <label class="custom-switch">
                                                <input type="checkbox" name="is_active" id="is_active" checked class="custom-switch-input" value="1">
                                                <span class="custom-switch-indicator"></span>
                                            </label>
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
