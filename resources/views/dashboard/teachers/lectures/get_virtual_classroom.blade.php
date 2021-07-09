@extends('dashboard.layouts.base')
@section('title') @lang('global.lecture_view_virtual_classroom') ( {{$lecture->name}} ) @stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
              <div class="card-status bg-blue"></div>
              <div class="card-header">
                <h3 class="card-title"> @lang('global.lecture_view_virtual_classroom') ( {{$lecture->name}} )</h3>
              </div>
              <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-bordered table-striped hover datatable">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>@lang('global.class_title')</th>
                                <th>@lang('global.start_time')</th>
                                <th>@lang('global.url_class')</th>                                 
                                <th>@lang('dashboard.header.studnets')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($classrooms as $index => $classroom)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$classroom["title"]}}</td>
                                <td>{{$classroom["start_time"]}}</td>
                                <td class="text-center">    
                                    <a class="btn btn-sm btn-outline-primary " target="_blank" href="{{$classroom->presenter_url}}">
                                        <i class="fe fe-airplay"></i> @lang('global.view_class') 
                                    </a>
                                    @if($classroom->webinar_url)
                                    <a class="btn btn-sm btn-outline-info " target="_blank" href="{{$classroom->webinar_url}}">
                                        <i class="fe fe-airplay"></i> Webinar
                                    </a>
                                    @endif
                                </td>
                                <td class="text-center"><a href="{{route("teacher.get.lecture.virtual_classroom.students",['id'=>array2string(['classroom_id'=>$classroom->id])])}}" class="btn btn-outline-primary btn-sm"><span class="">@lang('global.view_studnes') ( {{count($classroom->lecture->students)}} )</span></a></td>
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
@stop