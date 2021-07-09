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
                    <h3 class="card-title">@lang('dashboard.latestnews.create')</h3>
                    <div class="card-options">
                        <a href="{{ route('student-news.index') }}"><button class="btn btn-info pull-left">أخبار الطلاب <i class="fe fe-chevron-left" aria-hidden="true"></i></button></a>
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{route('student-news.store')}}" method="POST" class="ajax">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">@lang('dashboard.latestnews.title')</label>
                            <div class="input-icon">  
                                <span class="input-icon-addon">
                                <i class="fe fe-book"></i>
                                </span>
                                <input required type="text" class="form-control" id="title" name="title" placeholder="@lang('dashboard.latestnews.title')"  value="{{old('title')}}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group select-image-from-media">
                                <label class="form-label">{{__('dashboard.latestnews.image')}}</label>
                                <div class="input-group">
                                    <input  id="select-thumbnail" type="text" name="image" class="form-control">
                                    <div class="btn-group ">
                                        <button data-type="image" type="button" data-id="select-thumbnail" class="btn btn-primary btn-sm" data-preview="select-thumbnail-preview"><i class="fe fe-folder-plus"></i></button>
                                        <button data-trigger="focus" data-placement="top" data-toggle="popover"  id="select-thumbnail-preview" class="disabled btn btn-primary btn-sm" type="button"  ><i class="fe fe-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">@lang('dashboard.latestnews.description')</label>
                            <textarea placeholder="@lang('dashboard.latestnews.description')" class="form-control" name="body"></textarea>
                        </div>
                        <div class="form-group">
                                <label class="form-label">@lang('dashboard.subject.majors')</label>
                                <select class="form-control custom-select majors" name="major_id">
                                    <option></option>
                                    @foreach($majors as $major)
                                    <option value="{{$major->id}}">{{$major->name}}</option>
                                    @endforeach
                                </select>
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

@section('js')
<script src="{{asset('dashboard/assets/js/vendors/froala/js/froala_editor.pkgd.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/vendors/froala/js/languages/ar.js')}}"></script>
<script src="{{asset('dashboard/assets/js/vendors/froala/js/plugins/image.min.js')}}"></script>
<script> 
    $(function() { 
        $('textarea').froalaEditor({
            language: 'ar',
            imageUploadURL: '{{route("student-news.upload.image")}}',
            requestHeaders: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        }).on('froalaEditor.image.removed', function(e, editor, $img){
            $.ajax({
                method: 'DELETE',
                headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: '{{route("groups.remove.image")}}',
                data: {
                    src: $img.attr('src')
                }
            }).done(function(data){
                console.log ('Image was deleted');
            }).fail(function(err){
                console.log ('Image delete problem: ' + JSON.stringify(err));
            })
        });

    });
</script>
@endsection
