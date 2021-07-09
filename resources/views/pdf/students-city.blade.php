@extends('pdf.layout')

@section('title')
    Student Citys
@endsection

@section('content')
<div>
    <table>
        <thead>
            <tr>
                <th>المدينة</th>
                <th>عدد الطلاب</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item['name']}}</td>
                    <td>{{$item['studentsCount']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>                  
</div>
@endsection