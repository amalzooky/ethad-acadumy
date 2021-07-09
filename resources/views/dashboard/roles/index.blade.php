@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.header.roles') @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">@lang('dashboard.header.roles')</h3>
                    <div class="card-options">
                        <div class="btn-group">
                              <a class="btn btn-info" target="_blank" href="{{route('roles.export','print')}}">@lang('global.print')</a>
                              <a class="btn btn-info" href="{{route('roles.export','pdf')}}">@lang('global.pdf')</a>
                              <a class="btn btn-info" href="{{route('roles.export','xlsx')}}">@lang('global.xlsx')</a>
                              <a class="btn btn-info" href="{{route('roles.export','csv')}}">@lang('global.csv')</a>
                              <a class="btn btn-info" href="{{route('roles.export','xls')}}">@lang('global.xls')</a>
                        </div>
                        <a href="{{ route('roles.create') }}"><button class="btn btn-success pull-left">@lang('dashboard.header.role_create') <i class="fe fe-plus" aria-hidden="true"></i></button></a>
                    </div>

                  </div>
                  <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-striped hover datatable">
                            <thead class="table-dark">
                                <tr>
                                    <td>#</td>
                                    <td>@lang('dashboard.roles.name')</td>
                                    <td>@lang('global.permissions')</td>
                                    <td>@lang("global.created_at")</td>
                                    <td>@lang("global.updated_at")</td>
                                    <td>@lang('global.table_action')</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $index=>$role)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{\Lang::has("dashboard.roles.".$role->name) ? __("dashboard.roles.".$role->name) : $role->name}}</td>
                                    <td class="text-center">
                                        @foreach($role->permissions as $permission)
                                        
                                        <span class="badge badge-primary p-1">@lang("dashboard.permissions." . $permission->name)</span>
                                        @endforeach   
                                    </td>
                                    <td>{{($role->created_at)}}</td>
                                    <td>{{($role->updated_at)}}</td>
                                    <td class="text-center">
                                        
                                        <a href="{{route('roles.edit', $role->id)}}" title="@lang('dashboard.roles.edit')" class="btn btn-primary btn-sm mb-2 mb-sm-0"><i class="fe fe-edit" aria-hidden="true"></i></a>
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