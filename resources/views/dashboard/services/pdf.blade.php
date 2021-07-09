@extends('dashboard.layouts.pdf')
@section('pdfcontent')

<table class="table table-bordered table-striped hover datatable">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>@lang('dashboard.lecture.name')</th>
            <th>@lang('dashboard.subject.name')</th>
            <th>@lang('dashboard.lecture.teacher_name')</th>
            <td>@lang("global.created_at")</td>
            <td>@lang("global.updated_at")</td>
            <th>@lang('global.status')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lectures as $index => $lecture)
        <tr>
            <td>{{$index+1}}</td>
            
            <td>{{$lecture->name}}</td>
            <td>{{$lecture->subject->name}}</td>
            <td>{{$lecture->teacher->user->full_name}}</td>
            <td>{{formatDT($lecture->created_at)}}</td>
            <td>{{formatDT($lecture->updated_at)}}</td>
            <td>
                @if ($lecture->is_active)
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

