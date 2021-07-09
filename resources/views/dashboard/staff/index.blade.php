@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.header.staffs') @endsection

@section('content')


    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">@lang('dashboard.header.staffs')</h3>
                    <div class="card-options">
                        <div class="btn-group">
                              <a class="btn btn-info" target="_blank" href="{{route('staff.export','print')}}">@lang('global.print')</a>
                              <a class="btn btn-info" href="{{route('staff.export','pdf')}}">@lang('global.pdf')</a>
                              <a class="btn btn-info" href="{{route('staff.export','xlsx')}}">@lang('global.xlsx')</a>
                              <a class="btn btn-info" href="{{route('staff.export','csv')}}">@lang('global.csv')</a>
                              <a class="btn btn-info" href="{{route('staff.export','xls')}}">@lang('global.xls')</a>
                        </div>
                        <a href="{{ route('staff.create') }}"><button class="btn btn-success pull-left">@lang('dashboard.header.staff_create') <i class="fe fe-plus" aria-hidden="true"></i></button></a>
                    </div>

                  </div>
                  <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-striped hover datatable">
                            <thead class="table-dark">
                                <tr>
                                    <td>#</td>
                                    <td>@lang('dashboard.staff.image')</td>
                                    <td>@lang('global.full_name')</td>
                                    <td>@lang('global.mobile_number')</td>
                                    <td>@lang('global.email')</td>
                                    <td>@lang('dashboard.roles.role')</td>
                                    <td>@lang("global.created_at")</td>
                                    <td>@lang('global.status')</td>
                                    <td>@lang('global.table_action')</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($staff as $index => $staffInfo)

                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td><img src="{{asset($staffInfo->user->avatar ?? "")}}" class="dt-img"></td>
                                    <td>{{$staffInfo->user->full_name ?? ""}}</td>
                                    <td>{{$staffInfo->user->mobile_number ?? ""}}</td>
                                    <td>{{$staffInfo->user->email ?? ""}}</td>
                                    <td>{{$staffInfo->user->getRoleNames()[0] ?? ""}}</td>
                                    <td>{{($staffInfo->created_at ?? "")}}</td>
                                    <td class="text-center">
                                        <label class="custom-switch">
                                        <input type="checkbox" name="is_active" {{$staffInfo->user->is_active ? 'checked' : ''}} data-id="{{$staffInfo->user->id}}" data-url="{{route('staff.activation')}}" class="custom-switch-input activation" >
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                            @if($staffInfo->user->facebook_url ?? "")
                                            <a href="https://m.me/{{isset(explode('/',$staffInfo->user->facebook_url)[count(explode('/',$staffInfo->user->facebook_url ?? ""))-1])?explode('/',$staffInfo->user->facebook_url)[count(explode('/',$staffInfo->user->facebook_url))-1]:""}}"  target="_blank" class="btn btn-info btn-sm"><i class="fe fe-facebook" aria-hidden="true"></i></a>
                                                @endif

                                        <a href="{{route('staff.edit', $staffInfo->id)}}" title="@lang('dashboard.staff.edit')" class="btn btn-primary btn-sm mb-2 mb-sm-0"><i class="fe fe-edit" aria-hidden="true"></i></a>
                                                <a href="javascript:void(0)" data-url="{{route('staff.destroy', $staffInfo->id)}}" data-areyousure="هل أنت متأكد ؟" title="@lang('dashboard.staff.delete')" class="btn btn-danger btn-sm dt-btn-delete"><i class="fe fe-trash-2" aria-hidden="true"></i></a>

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
