@extends('dashboard.layouts.base')

@section('title') @lang($title) @endsection

@section('content')


    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-status bg-blue"></div>
                    <div class="card-header">
                        <h3 class="card-title">@lang('dashboard.header.studnets')</h3>
                        <div class="card-options">
                            <div class="select-report-header">
                                <select class="select2 form-control studentsSelectYear">
                                    <option @if( "all" == $year) {{'selected'}} @endif data-active="{{$active}}" value="all">كل المستخدمين</option>
                                    @foreach ($studentsYears as $studentsYear)
                                        <option @if( $studentsYear->year == $year) {{'selected'}} @endif data-active="{{$active}}" value="{{$studentsYear->year}}">{{$studentsYear->year}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="btn-group">
                                <a class="btn btn-info" href="{{route('reports.students',[$active,$year])}}">@lang('global.print')</a>
                            </div>

                            <a href="{{ route('students.create') }}"><button class="btn btn-success pull-left">@lang('dashboard.header.students_create') <i class="fe fe-plus" aria-hidden="true"></i></button></a>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-bordered table-striped hover" id="users_table">
                                <thead class="table-dark">
                                <tr>
                                    <td>id</td>
                                    <td>@lang('dashboard.students.image')</td>
                                    <td>@lang('global.full_name')</td>
                                    <td>@lang('global.mobile_number')</td>
                                    <td>@lang('global.email')</td>
                                    <td>@lang("global.created_at")</td>
                                    <td>@lang('global.table_action')</td>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div><!-- end card body -->
                </div>
            </div>
        </div> <!-- end row -->
    </div>
@endsection

@section('js')
    <script>
        $('#users_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/dashboard/students/datatable?active='+"<?=$active?>&year="+"<?=$year?>",
            columns: [
                {'data': 'id'},
                {'data': 'avatar', 'orderable': false, 'searchable': false},
                {'data': 'full_name', 'name': 'user.full_name'},
                {'data': 'user.mobile_number'},
                {'data': 'email', 'name': 'user.email'},
                {'data': 'created_at', 'name': 'created_at'},
                {'data': 'action', 'name': 'action', 'orderable': false, 'searchable': false},
            ],
        });
    </script>
@stop
