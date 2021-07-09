@extends('dashboard.layouts.base')

@section('title') إضافة شريحة @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">إضافة شريحة</h3>
                    <div class="card-options">
                        <a href="{{ route('sliders.index') }}"><button class="btn btn-info pull-left">الشرائح <i class="fe fe-chevron-left" aria-hidden="true"></i></button></a>
                    </div>
                  </div>
                  <div class="card-body">
                      <form action="{{route('sliders.store')}}" method="post" enctype="multipart/form-data">

{{--                        <input type="hidden" id="token" value="{{csrf_token()}} >--}}

                        @csrf
                        <div class="form-group">
                            <div class="form-group select-image-from-media">
                                <label class="form-label">الشريحة</label>
                                <div class="input-group">
                                    <input  type="file" name="image" class="form-control">
{{--                                    <div class="btn-group ">--}}
{{--                                        <button data-type="image" type="button" data-id="select-thumbnail" class="btn btn-primary btn-sm" data-preview="select-thumbnail-preview"><i class="fe fe-folder-plus"></i></button>--}}
{{--                                        <button data-trigger="focus" data-placement="top" data-toggle="popover"  id="select-thumbnail-preview" class="disabled btn btn-primary btn-sm" type="button"  ><i class="fe fe-search"></i></button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">عنوان الشريحة</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                <i class="fe fe-book"></i>
                                </span>
                                <input type="text" class="form-control" id="title" name="title" placeholder="عنوان الشريحة"  value="{{old('title')}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="description" class="form-label">وصف الشريحة</label>
                                <textarea class="form-control" id="description" name="desc" rows="5" placeholder="وصف الشريحة" required></textarea>
                            </div>
                        <div class="form-group">
                            <div class="form-label">@lang('global.status')</div>
                            <label class="custom-switch">
                                <input type="checkbox" name="is_active" id="is_active" class="custom-switch-input" value="1">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                        <button  type="submit" class="btn btn-primary btn-block mt-5">@lang('global.save')</button>
                    </form>
                  </div><!-- end card body -->
                </div>
            </div>
        </div> <!-- end row -->
    </div>
@endsection
