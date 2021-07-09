@extends('dashboard.layouts.pdf')
@section('pdfcontent')

<table>

        <thead>
            <tr>
                <td>#</td>
                <td>{{__("dashboard.major.name")}}</td>
                <td>{{__("global.created_at")}}</td>
                <td>{{__("global.updated_at")}}</td>
                <td>{{__("global.status")}}</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($majors as $major)
                <tr>
                    <td>{{$major->id}}</td>
                    <td>{{$major->name}}</td>
                    <td>{{formatDT($major->created_at)}}</td>
                    <td>{{formatDT($major->updated_at)}}</td>
                    <td>
                        @if ($major->is_active)
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