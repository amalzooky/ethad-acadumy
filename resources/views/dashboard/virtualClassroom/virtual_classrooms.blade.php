@extends('dashboard.layouts.base')
@section('title') @lang('dashboard.header.virtual_classroom') @stop

@section('content')
<div class="container">
  <div class="row">
      <div class="col">
          <div class="card">
            <div class="card-status bg-blue"></div>
            <div class="card-header">
              <h3 class="card-title">@lang('dashboard.header.virtual_classroom')</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive-sm">
                  <table class="table table-bordered table-striped hover datatable">
                      <thead class="table-dark">
                          <tr>
                              <td class="w-1">#</td>
                              <td>العنوان</td>
                              <td>رابط التسجيل</td>
                              <td>الطلاب</td>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($virtualClassrooms as $index => $room)
                            <tr>
                                <td>{{++$index}}</td>
                                <td>{{$room->title}}</td>
                                <td class="text-center">
                                    @if($room->recording_url)<a href="{{$room->recording_url}}" target="_blank" class="btn btn-outline-primary">Wiziq</a>@endif
                                    @if($room->webinar_url)<a href="{{$room->webinar_url }}" target="_blank" class="btn btn-outline-success">Gotowebinar</a>@endif
                                    @if($room->zoom_join_url)<a href="{{$room->zoom_join_url }}" target="_blank" class="btn btn-outline-info">Zoom</a>@endif
                                   
                                </td>
                                @can('managment_students_notes')
                                <td class="text-center"><a href="{{route("teacher.get.lecture.virtual_classroom.students",['id'=>array2string(['classroom_id'=>$room->id])])}}" class="btn btn-outline-primary btn-sm"><span class="">@lang('global.view_studnes') ( {{count($room->lecture->subject->students)}} )</span></a></td>
                                    
                                @endcan
                            </tr>
                        @endforeach
                      </tbody>
                  </table> 
              </div>
            </div><!-- end card body -->
          </div>
      </div>
  </div>
</div>
@stop
