@extends('dashboard.layouts.pdf')
@section('pdfcontent')
    <table class="table table-bordered table-striped hover datatable">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>@lang('dashboard.roles.name')</th>
                <td>@lang("global.created_at")</td>
                <td>@lang("global.updated_at")</td>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $index=>$role)
            <tr>
                <td>{{$index+1}}</td>
                <td>{{\Lang::has("dashboard.roles.".$role->name) ? __("dashboard.roles.".$role->name) : $role->name}}</td>
                <td>{{formatDT($role->created_at)}}</td>
                <td>{{formatDT($role->updated_at)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection