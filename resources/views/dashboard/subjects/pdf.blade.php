@extends('dashboard.layouts.pdf')
@section('pdfcontent')
<table class="table table-bordered table-striped hover datatable">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>@lang('dashboard.subject.name')</th>
                <th>@lang('dashboard.major.name')</th>
                <td>@lang("global.created_at")</td>
                <td>@lang("global.updated_at")</td>
                <th>@lang('global.status')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subjects as $subject)
            <tr>
                <td>{{$subject->id}}</td>
                <td>{{$subject->name}}</td>
                <td>{{$subject->major->name}}</td>
                <td>{{formatDT($subject->created_at)}}</td>
                <td>{{formatDT($subject->updated_at)}}</td>
                <td class="text-center">
                        @if ($subject->is_active)
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