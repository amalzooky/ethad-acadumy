@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.header.lectures') @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">@lang('dashboard.header.lectures')</h3>
                    <div class="card-options">
                        <div class="btn-group">
                              <a class="btn btn-info" target="_blank" href="{{route('lectures.export','print')}}">@lang('global.print')</a>
                              <a class="btn btn-info" href="{{route('lectures.export','pdf')}}">@lang('global.pdf')</a>
                              <a class="btn btn-info" href="{{route('lectures.export','xlsx')}}">@lang('global.xlsx')</a>
                              <a class="btn btn-info" href="{{route('lectures.export','csv')}}">@lang('global.csv')</a>
                              <a class="btn btn-info" href="{{route('lectures.export','xls')}}">@lang('global.xls')</a>
                        </div>
                        <a href="{{ route('lectures.create') }}"><button class="btn btn-success pull-left">@lang('dashboard.header.lecture_create') <i class="fe fe-plus" aria-hidden="true"></i></button></a>
                    </div>

                  </div>
                  <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-striped hover datatable">
                            <thead class="table-dark">
                                <tr>
                                    <td>#</td>
                                    <td>@lang('dashboard.lecture.name')</td>
                                    <td>@lang('dashboard.subject.name')</td>
                                    <td>@lang('dashboard.lecture.teacher_name')</td>
{{--                                    <td>@lang("global.created_at")</td>--}}
{{--                                    <td>@lang("global.updated_at")</td>--}}
                                    <td>@lang('global.status')</td>
                                    <td>@lang('global.table_action')</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lectures as $index => $lecture)
                                <tr>
                                    <td>{{$index+1}}</td>

                                    <td>{{$lecture->name ?? ""}}</td>
                                    <td>{{$lecture->subject->name ?? ""}} / {{$lecture->subject->major->name ?? ""}} / {{$lecture->subject->semester ?? ""}}</td>
                                    <td>{{$lecture->teacher->user->full_name ?? ""}}</td>
{{--                                    <td>{{($lecture->created_at)}}</td>--}}
{{--                                    <td>{{($lecture->updated_at)}}</td>--}}
                                    <td class="text-center">
                                        <label class="custom-switch">
                                        <input type="checkbox" name="is_active" {{$lecture->is_active ? 'checked' : ''}} data-id="{{$lecture->id}}" data-url="{{route('lecture.activation')}}" class="custom-switch-input activation" >
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('lectures.edit', $lecture->id)}}" title="@lang('dashboard.lecture.edit')" class="btn btn-primary btn-sm mb-2 mb-sm-0"><i class="fe fe-edit" aria-hidden="true"></i></a>
                                        <a href="javascript:void(0)" data-url="{{route('lectures.destroy', $lecture->id)}}" data-areyousure="???? ?????? ?????????? ??" title="@lang('dashboard.lectures.delete')" class="btn btn-danger btn-sm dt-btn-delete"><i class="fe fe-trash-2" aria-hidden="true"></i></a>

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
