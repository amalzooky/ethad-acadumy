@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.header.teachers') @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">@lang('dashboard.header.teachers')</h3>
                    <div class="card-options">
                            <div class="select-report-header">
                                <select class="select2 form-control teachersSelectYear">
                                    <option @if( "all" == $year) {{'selected'}} @endif  value="all">كل المعلمين</option>
                                    @foreach ($teachersYears as $teachersYear)
                                    <option @if( $teachersYear->year == $year) {{'selected'}} @endif  value="{{$teachersYear->year}}">{{$teachersYear->year}}</option>

                                    @endforeach
                                </select>
                            </div>
                        {{-- <div class="btn-group">
                              <a class="btn btn-info" href="{{route('teachers.export','xlsx')}}">@lang('global.xlsx')</a>
                              <a class="btn btn-info" href="{{route('teachers.export','csv')}}">@lang('global.csv')</a>
                              <a class="btn btn-info" href="{{route('teachers.export','xls')}}">@lang('global.xls')</a>
                        </div> --}}
                        <a href="{{ route('teachers.create') }}"><button class="btn btn-success pull-left">@lang('dashboard.header.teacher_create') <i class="fe fe-plus" aria-hidden="true"></i></button></a>
                    </div>

                  </div>
                  <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-striped hover datatable">
                            <thead class="table-dark">
                                <tr>
                                    <td>#</td>
                                    <td>@lang('dashboard.teacher.teacher_image')</td>
                                    <td>@lang('global.full_name')</td>
                                    {{-- <td>@lang('dashboard.teacher.teacher_subjects')</td> --}}
                                    <td>@lang('global.mobile_number')</td>
                                    <td>@lang('global.email')</td>
                                    <td>@lang("global.created_at")</td>
                                    <td>@lang('global.status')</td>
                                    <td>@lang('global.table_action')</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teachers as $index => $teacher)
                                <tr>
                                    <td>{{$index+1}}</td>

                                    <td><a href="{{route('teachers.show', $teacher->id)}}"><img src="{{asset('dashboard')}}/{{($teacher->user->avatar)}}" class="dt-img"></a></td>
                                    <td><a href="{{route('teachers.show', $teacher->id)}}">{{$teacher->user->full_name}}</a></td>
                                    {{-- <td class="text-center">
                                        @foreach($teacher->subjects as $subject)

                                        <span class="badge badge-primary p-1">{{$subject->name}} / {{$subject->major->name}} / {{$subject->semester}}</span>
                                        @endforeach
                                    </td> --}}
                                    <td>{{$teacher->user->mobile_number}}</td>
                                    <td>{{$teacher->user->email}}</td>
                                    <td></td>
                                    <td class="text-center">
                                        <label class="custom-switch">
                                        <input type="checkbox" name="is_active" {{$teacher->user->is_active ? 'checked' : ''}} data-id="{{$teacher->user->id}}" data-url="{{route('teacher.activation')}}" class="custom-switch-input activation" >
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                            @if($teacher->user->facebook_url)
                                            <a href="https://m.me/{{isset(explode('/',$teacher->user->facebook_url)[count(explode('/',$teacher->user->facebook_url))-1])?explode('/',$teacher->user->facebook_url)[count(explode('/',$teacher->user->facebook_url))-1]:""}}"  target="_blank" class="btn btn-primary btn-sm"><i class="fe fe-facebook" aria-hidden="true"></i></a>
                                                @endif
                                        <a href="{{route('teachers.edit', $teacher->id)}}" title="@lang('dashboard.teacher.teacher_edit')" class="btn btn-info btn-sm mb-2 mb-sm-0"><i class="fe fe-edit" aria-hidden="true"></i></a>
                                                <a href="javascript:void(0)" data-url="{{route('teachers.destroy', $teacher->id)}}" data-areyousure="هل أنت متأكد ؟" title="@lang('dashboard.major.delete')" class="btn btn-danger btn-sm dt-btn-delete"><i class="fe fe-trash-2" aria-hidden="true"></i></a>
                                        <a href="{{route('teachers.notes', $teacher->id)}}" class="btn btn-success btn-sm mb-2 mb-sm-0"><i class="fe fe-edit-2" aria-hidden="true"></i></a>
                                        @can('managment_chats')
                                        <a  target="_blank" href="" class="btn btn-success btn-sm "><i class="fe fe-message-circle" aria-hidden="true"></i></a>
                                        @endcan
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
