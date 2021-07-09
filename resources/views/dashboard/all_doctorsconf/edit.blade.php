@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.latestnews.edit') @stop

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
                    <h3 class="card-title">تعديل الدكتور</h3>
                    <div class="card-options">
                        <a href="{{ route('alldoctconf.index') }}"><button class="btn btn-info pull-left">اعضاء المؤتمر <i class="fe fe-chevron-left" aria-hidden="true"></i></button></a>
                    </div>
                  </div>
                  <div class="card-body">

                      <form action="{{route('alldoctconf.update',$doctors->id)}}" method="POST" class="ajax">
                          @csrf
                          @method("patch")


                        <div class="form-group">
                            <label for="name" class="form-label">أسم الدكتور</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                <i class="fe fe-book"></i>
                                </span>
                                <input value="{{$doctors->doct_name}}" required type="text" class="form-control" id="title" name="doct_name" placeholder="@lang('dashboard.latestnews.title')"  value="{{old('title')}}" required autofocus>
                            </div> <label for="name" class="form-label">وظيفة الدكتور</label>
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                <i class="fe fe-book"></i>
                                </span>
                                <input value="{{$doctors->doct_job}}" required type="text" class="form-control" id="title" name="doct_job" placeholder="@lang('dashboard.latestnews.title')"  value="{{old('title')}}" required autofocus>
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

@section('js')
<script src="{{asset('dashboard/assets/js/vendors/froala/js/froala_editor.pkgd.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/vendors/froala/js/languages/ar.js')}}"></script>
<script src="{{asset('dashboard/assets/js/vendors/froala/js/plugins/image.min.js')}}"></script>
<script>
    $(function() {
        $('textarea').froalaEditor({
            language: 'ar',
            imageUploadURL: '{{route("latestnews.upload.image")}}',
            requestHeaders: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        }).on('froalaEditor.image.removed', function(e, editor, $img){
            $.ajax({
                method: 'POST',
                headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: '{{route("latestnews.remove.image")}}',
                data: {
                    src: $img.attr('src')
                }
            }).done(function(data){
                console.log ('Image was deleted');
            }).fail(function(err){
                console.log ('Image delete problem: ' + JSON.stringify(err));
            })
        });
        $(".fr-wrapper div:first-child").css({ display: "none" });
        $("textarea").on(
        "froalaEditor.contentChanged",
        function(e, editor) {
            $("show-placeholder div:first-child").css({
                display: "none"
            });
        }
    );
    });
</script>
@endsection
