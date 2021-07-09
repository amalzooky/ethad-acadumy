@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.header.majors') @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">@lang('dashboard.header.majors')</h3>
                    <div class="card-options">
                        <div class="btn-group">
                              <a class="btn btn-info" target="_blank" href="{{route('major.export','print')}}">@lang('global.print')</a>
                              <a class="btn btn-info" href="{{route('major.export','pdf')}}">@lang('global.pdf')</a>
                              <a class="btn btn-info" href="{{route('major.export','xlsx')}}">@lang('global.xlsx')</a>
                              <a class="btn btn-info" href="{{route('major.export','csv')}}">@lang('global.csv')</a>
                              <a class="btn btn-info" href="{{route('major.export','xls')}}">@lang('global.xls')</a>
                        </div>
                        <a href="{{ route('majors.create') }}"><button class="btn btn-success pull-left">@lang('dashboard.header.major_create') <i class="fe fe-plus" aria-hidden="true"></i></button></a>
                    </div>

                  </div>
                  <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-striped hover datatable">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
{{--                                    <td>@lang('dashboard.major.image')</td>--}}
                                    <td>@lang('dashboard.major.name')</td>
                                    <td>@lang("global.created_at")</td>
                                    <td>@lang("global.updated_at")</td>
                                    <td>@lang('global.status')</td>
                                    <td>@lang('global.table_action')</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($majors as $index => $major)
                                <tr>
                                    <td>{{$index+1}}</td>
{{--                                    <td><img src="{{$major->image}}" class="dt-img"></td>--}}
                                    <td>{{$major->name}}</td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">
                                        <label class="custom-switch">
                                        <input type="checkbox" name="is_active" {{$major->is_active ? 'checked' : ''}} data-id="{{$major->id}}" data-url="{{route('major.activation')}}" class="custom-switch-input activation" >
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('majors.edit', $major->id)}}" title="@lang('dashboard.major.edit')" class="btn btn-primary btn-sm mb-2 mb-sm-0"><i class="fe fe-edit" aria-hidden="true"></i></a>
                                        <a href="javascript:void(0)" data-url="{{route('majors.destroy', $major->id)}}" data-areyousure="هل أنت متأكد ؟" title="@lang('dashboard.major.delete')" class="btn btn-danger btn-sm dt-btn-delete"><i class="fe fe-trash-2" aria-hidden="true"></i></a>

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
