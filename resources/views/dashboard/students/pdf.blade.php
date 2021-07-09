@extends('dashboard.layouts.pdf')
@section('pdfcontent')

<table class="table table-bordered table-striped hover datatable">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>@lang('global.full_name')</th>
            <th>@lang('dashboard.students.subjects')</th>
            <th>@lang('global.mobile_number')</th>
            <th>@lang('global.email')</th>
            <th>@lang("global.created_at")</th>
            <th>@lang('global.status')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $index => $student)

        <tr>
            <td>{{$index+1}}</td>
            <td><a href="{{route('students.show', $student->id)}}">{{$student->user->full_name}}</a></td>
            <td class="text-center">
                @foreach($student->subjects as $subject)
                    <span>{{$subject->name}},</span>
                @endforeach   
            </td>
            <td>{{$student->user->mobile_number}}</td>
            <td>{{$student->user->email}}</td>
            <td>{{formatDT($student->created_at)}}</td>
            <td>
                @if ($student->user->is_active)
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