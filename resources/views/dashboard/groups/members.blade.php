@extends('dashboard.layouts.base')

@section('title') @lang('global.members') @stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
                <div class="card p-5">
                        <table class="table card-table table-vcenter datatable">
                            <thead>
                                <tr>
                                    <th>الصورة</th>
                                    <th class="text-center">اﻹسم</th>
                                    @can('managment_groups')
                                    <th class="text-right">تحكم</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($group->users as $user)
                                <tr>
                                    <td><span class="avatar d-block rounded" style="background-image: url('{{asset($user->avatar)}}')"></span></td>
                                    <td class="text-center">{{$user->username}}</td>
                                    @can('managment_groups')
                                    <td class="text-right">
                                        <a href="javascript:void(0)" data-url="{{url("dashboard/groups/{$group->id}/members/{$user->id}/delete")}}" data-areyousure="هل أنت متأكد ؟"  class="btn btn-danger btn-sm dt-btn-delete {{$user->id === $group->user_id ? 'disabled' : ''}}"><i class="fe fe-trash-2" aria-hidden="true"></i></a>
                                    </td>
                                    @endcan
                                </tr>
                                @endforeach
                    
                            </tbody>
                        </table>
                    </div>
        </div>
    </div>
</div>
@stop