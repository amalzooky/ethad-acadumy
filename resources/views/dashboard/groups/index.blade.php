@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.header.groups') @stop


@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">@lang('dashboard.header.groups')</h3>
                    <div class="card-options">
                        <a href="{{ route('groups.create') }}"><button class="btn btn-success pull-left">@lang('dashboard.groups.create') <i class="fe fe-plus" aria-hidden="true"></i></button></a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-striped hover datatable">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
{{--                                    <td>@lang('dashboard.groups.image')</td>--}}
                                    <td>@lang('dashboard.groups.name')</td>
                                    <td>@lang('global.created_at')</td>
                                    <td>@lang('global.table_action')</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groups as $index => $group)
                                    <tr>
                                        <td>{{$index+1}}</td>
{{--                                        <td><img src="{{$group->image}}" class="dt-img"></td>--}}
                                        <td>{{$group->name}}</td>
                                        <td></td>
                                        <td class="text-center">
                                            <a href="{{route('groups.edit', $group->id)}}" class="btn btn-primary btn-sm mb-2 mb-sm-0"><i class="fe fe-edit" aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-url="{{route('group.delete', $group->id)}}" data-areyousure="هل أنت متأكد ؟"  class="btn btn-danger btn-sm dt-btn-delete"><i class="fe fe-trash-2" aria-hidden="true"></i></a>
                                            @can('managment_chats')
                                            <!--  -->
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

@stop
