@extends('dashboard.layouts.base')

@section('title') ملاحظات عن المعلم @endsection
@section('content')


    <div class="container"> 
        <div class="row">
            <div class="col"> 
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">أكتب ملاحظتك عن المعلم</h3>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped hover datatable" id="">
                            <thead class="table-dark">
                                <tr>
                                    <td>المعلم</td>
                                    <td>@lang('global.table_action')</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $index => $teacher)
                                    <tr>
                                        <td>{{$teacher[0]->user->full_name}}</td>
                                        <td class="text-center">
                                            <a href="{{route('student.teacher.note.create', $teacher[0]->id)}}" class="btn btn-primary btn-sm mb-2 mb-sm-0"><i class="fe fe-edit" aria-hidden="true"></i></a>  
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
@endsection

