@extends('dashboard.layouts.base')

@section('title')  @endsection

@section('content')
    <div class="container">
        @foreach($lectures as $lecture)
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-status bg-blue"></div>
                    <div class="card-header">
                        <h3 class="card-title">{{$lecture->name}}</h3>    
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-bordered table-striped hover datatable">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>الحصة</th>
                                        @can('managment_students_notes')
                                        <th>الطلاب</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lecture->virtualClassrooms as $index => $class)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$class->title}}</td>
                                        @can('managment_students_notes')
                                        <td class="text-center"><a href="{{route("teacher.get.lecture.virtual_classroom.students",['id'=>array2string(['classroom_id'=>$class->id])])}}" class="btn btn-outline-primary btn-sm"><span class="">@lang('global.view_studnes') ( {{count($class->lecture->students)}} )</span></a></td>
                                            
                                        @endcan

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- end card body -->
                </div>
            </div>
        </div><!-- end row -->
        @endforeach
    </div>
@endsection