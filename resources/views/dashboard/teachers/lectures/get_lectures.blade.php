@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.header.lectures') @stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">@lang('dashboard.header.lectures')</h3>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-striped hover datatable">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>@lang('dashboard.lecture.name')</th>
                                    <th>@lang('dashboard.subject.name')</th>
                                    <th>@lang('dashboard.header.virtual_classroom')</th>
                                    <th>@lang('dashboard.header.studnets')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lectures as $index=>$lecture )
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$lecture->name}}</td>
                                        <td>{{$lecture->subject->name}}</td>
                                        <td class="text-center"><a href="{{route("teacher.get.lecture.virtual_classroom",['id'=>array2string(['lecture_id'=>$lecture->id])])}}" class="btn btn-outline-primary btn-sm"><span>@lang('global.view_virtual_classroom') ( {{count($lecture->virtualClassrooms)}} )</span></a></td>
                                        <td class="text-center"><a href="{{route("teacher.get.lecture.students",['id'=>array2string(['lecture_id'=>$lecture->id])])}}" class="btn btn-outline-primary btn-sm"><span class="">@lang('global.view_studnes') ( {{count($lecture->students)}} )</span></a></td>
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
@endsection