@extends('dashboard.layouts.base')
@section('title') @lang('dashboard.header.subjects') @stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
              <div class="card-status bg-blue"></div>
              <div class="card-header">
                <h3 class="card-title">@lang('dashboard.header.classrooms')</h3>
              </div>
              <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-bordered table-striped hover datatable">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>@lang('global.class_title')</th>
                                <th>@lang('global.start_time')</th>
                                {{-- <th>@lang('global.end_time')</th> --}}
                                <th>@lang('global.description')</th>
                                <th>@lang('global.view_class')</th>                                 
                                <th>@lang('global.record')</th>
                                <th>ملاحظة المدرس</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($classrooms as $index => $classroom)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$classroom["title"]}}</td>
                                <td>{{$classroom["start_time"]}}</td>
                                <td>{{$classroom["webinar_description"]}}</td>
                                <td class="text-center">    
                                    @if($classroom["wiziq_url"])                       
                                        <a class="btn btn-sm btn-success mb-2" target="_blank" href="{{route("student.watch",$classroom["urls"])}}">
                                            مشاهدة الحصة Wiziq
                                        </a>
                                        <br>
                                    @endif
                                   
                                
                                    @if($classroom['webinar_url']) 
                                    <a data-lecture="{{$classroom['virtual_classroom_id']}}" data-recored="webinar" href="{{route('student.record.webinar',$classroom["urls"])}}" target="_blank" class="recored_counter btn btn-sm btn-primary btn-block">مشاهدة الحصة Webinar</a>
                                    <br>
                                    @endif

                                    @if($classroom['zoom_join_url']) 
                                    <a href="{{route('student.record.zoom',$classroom["urls"])}}" target="_blank" class="btn btn-sm btn-info btn-block">مشاهدة الحصة Zoom</a>
                                    @endif

                                    
                                </td>
                                <td> 
                                    {{-- @if($classroom['wiziq_url'])                           --}}
                                    <a target="_blank" data-lecture="{{$classroom['virtual_classroom_id']}}" data-recored="wiziq" class="recored_counter btn btn-sm btn-success mb-2 @if(!$classroom['availableRecording']) {{'disabled'}} @endif" href="{{route('student.record',$classroom["urls"])}}">
                                       عرض تسجيل Wiziq
                                    </a>
                                    {{-- @endif --}}
                                    
                                    @if($classroom['webinar_url'])
                                    <br>
                                    <a data-lecture="{{$classroom['virtual_classroom_id']}}" data-recored="webinar" href="{{route('student.record.webinar',$classroom["urls"])}}" target="_blank" class="recored_counter btn btn-sm btn-primary btn-block">عرض تسجيل Webinar</
                                    @endif
                                    {{-- @if($classroom['zoom_join_url'])
                                    <br>
                                    <a href="{{route('student.record.zoom',$classroom["urls"])}}" target="_blank" class="btn btn-sm btn-info btn-block">تسجيل Zoom</a>
                                    @endif --}}
                                </td>
                     
                    <td class="text-center">
                       @if($classroom["note"] != "-")
                    <button type="button" data-note="{{$classroom["note"]}}"  data-toggle="modal" data-target="#modal-show-note" class="btn btn-sm btn-outline-info btn-view-note"><i class="fa fa-eye"></i></button>
                       @else 
                       {{$classroom["note"]}}
                       @endif
                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              </div><!-- end card body -->
            </div>
        </div>
    </div> <!-- end row -->
</div>

<div class="modal fade" id="modal-show-note" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
   
            <div class="modal-body">
             <p  ></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            </div>
          </div>
        </div>
      </div>
@stop

@section('js')
    <script>
        $(function(){
            $("table").on("click",".btn-view-note",function(){
                let note = $(this).attr("data-note");
                $("#modal-show-note p").text(note);
            })
        })
    </script>
@endsection