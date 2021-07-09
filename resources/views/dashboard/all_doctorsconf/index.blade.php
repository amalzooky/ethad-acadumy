@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.header.lectures') @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-status bg-blue"></div>
                    <div class="card-header">
                        <h3 class="card-title">@lang('dashboard.header.courses')</h3>
                        <div class="card-options">
                            <div class="btn-group">
                                <a class="btn btn-info" target="_blank" href="{{route('lectures.export','print')}}">@lang('global.print')</a>
                                <a class="btn btn-info" href="{{route('courses.export','pdf')}}">@lang('global.pdf')</a>
                                <a class="btn btn-info" href="{{route('courses.export','xlsx')}}">@lang('global.xlsx')</a>
                                <a class="btn btn-info" href="{{route('courses.export','csv')}}">@lang('global.csv')</a>
                                <a class="btn btn-info" href="{{route('courses.export','xls')}}">@lang('global.xls')</a>
                            </div>
                            <a href="{{ route('alldoctconf.create') }}"><button class="btn btn-success pull-left">دكتور مؤتمر  <i class="fe fe-plus" aria-hidden="true"></i></button></a>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-bordered table-striped hover datatable">
                                <thead class="table-dark">
                                <tr>
                                  <td>أسم الدكتور</td>

                                    <td>الوظيفة</td>

                                    <td>@lang('global.table_action')</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($alldoct as  $cert)
                                    <tr>

                                        <td>{{$cert->doct_name ?? ""}}</td>
                                        <td>{{$cert->doct_job ?? ""}}</td>


                                        <td class="text-center">
                                            <a href="{{route('alldoctconf.edit', $cert->id)}}" title="@lang('dashboard.lecture.edit')" class="btn btn-primary btn-sm mb-2 mb-sm-0"><i class="fe fe-edit" aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-url="{{route('alldoctconf.destroy', $cert->id)}}" data-areyousure="هل أنت متأكد ؟" title="@lang('dashboard.lectures.delete')" class="btn btn-danger btn-sm dt-btn-delete"><i class="fe fe-trash-2" aria-hidden="true"></i></a>


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
