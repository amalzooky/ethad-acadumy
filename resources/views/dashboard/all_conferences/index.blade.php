@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.header.lectures') @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-status bg-blue"></div>
                    <div class="card-header">
                        <h3 class="card-title">مؤتمرات</h3>
                        <div class="card-options">
                            <div class="btn-group">
                                <a class="btn btn-info" target="_blank" href="{{route('lectures.export','print')}}">@lang('global.print')</a>
                                <a class="btn btn-info" href="{{route('courses.export','pdf')}}">@lang('global.pdf')</a>
                                <a class="btn btn-info" href="{{route('courses.export','xlsx')}}">@lang('global.xlsx')</a>
                                <a class="btn btn-info" href="{{route('courses.export','csv')}}">@lang('global.csv')</a>
                                <a class="btn btn-info" href="{{route('courses.export','xls')}}">@lang('global.xls')</a>
                            </div>
                            <a href="{{ route('allconference.create') }}"><button class="btn btn-success pull-left">انشاء مؤتمر <i class="fe fe-plus" aria-hidden="true"></i></button></a>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-bordered table-striped hover datatable">
                                <thead class="table-dark">
                                <tr>
                                  <td>صوره الطالب او الكارنيه</td>

                                    <td>اسم الشهاده</td>
                                    <td>محتوي الشهاده</td>
                                    {{--                                    <td>@lang("global.created_at")</td>--}}
                                    {{--                                    <td>@lang("global.updated_at")</td>--}}
                                    <td>سم الطالب</td>
                                    <td>ماده الشهاده</td>
                                    <td>@lang('global.table_action')</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($allconfe as  $cert)
                                    <tr>
                                        <td><img src="{{$cert->cart_stud ?? ""}}" class="dt-img"></td>

                                        <td>{{$cert->name_certificat ?? ""}}</td>
                                        <td>{{$cert->cont_certificate ?? ""}}</td>
                                        <td>{{$cert->namestudent ?? ""}}</td>
                                        <td>{{$cert->student_subj ?? ""}}</td>
                                        {{--                                    <td>{{($lecture->created_at)}}</td>--}}

                                        <td class="text-center">
                                            <a href="{{route('allconference.edit', $cert->id)}}" title="@lang('dashboard.lecture.edit')" class="btn btn-primary btn-sm mb-2 mb-sm-0"><i class="fe fe-edit" aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-url="{{route('allconference.destroy', $cert->id)}}" data-areyousure="هل أنت متأكد ؟" title="@lang('dashboard.lectures.delete')" class="btn btn-danger btn-sm dt-btn-delete"><i class="fe fe-trash-2" aria-hidden="true"></i></a>


                                         <a href="{{route('allconference.show', $cert->id)}}" >عرض</a>

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
