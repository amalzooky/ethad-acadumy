@extends('dashboard.layouts.pdf')
@section('pdfcontent')
<table class="table table-bordered table-striped hover datatable">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>@lang('global.full_name')</th>
                <th>@lang('global.mobile_number')</th>
                <th>@lang('global.email')</th>
                <td>@lang("global.created_at")</td>
                <th>@lang('global.status')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $index => $teacher)
            <tr>
                <td>{{$index+1}}</td>
                <td><a href="{{route('teachers.show', $teacher->id)}}">{{$teacher->user->full_name}}</a></td>
                <td>{{$teacher->user->mobile_number}}</td>
                <td>{{$teacher->user->email}}</td>
                <td>{{formatDT($teacher->created_at)}}</td>
                <td class="text-center">
                    @if ($teacher->user->is_active)
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