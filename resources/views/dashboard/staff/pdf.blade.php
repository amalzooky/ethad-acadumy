@extends('dashboard.layouts.pdf')
@section('pdfcontent')
<table class="table table-bordered table-striped hover datatable">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>@lang('global.full_name')</th>
            <th>@lang('global.mobile_number')</th>
            <th>@lang('global.email')</th>
            <th>@lang('dashboard.roles.role')</th>
            <th>@lang("global.created_at")</th>
            <th>@lang('global.status')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($staff as $index => $staffInfo)

        <tr>
            <td>{{$index+1}}</td>
            <td>{{$staffInfo->user->full_name}}</td>
            <td>{{$staffInfo->user->mobile_number}}</td>
            <td>{{$staffInfo->user->email}}</td>
            <td>{{$staffInfo->user->getRoleNames()[0]}}</td>
            <td>{{formatDT($staffInfo->created_at)}}</td>
            <td class="text-center">
                @if ($staffInfo->user->is_active)
                    {{__("global.active")}}
                @else
                    {{__("global.inactive")}}
                @endif
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection