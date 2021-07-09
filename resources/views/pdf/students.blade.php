@extends('pdf.layout')

@section('title')
    Students
@endsection

@section('content')
<div>
    <table>
        <thead>
            <tr>
                <th>الاسم</th>
                <th>رقم الهاتف</th>
                <th>البريد الألكتروني</th>
                <th>المدينة </th>
                <th>الجنس </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->user->full_name}}</td>
                    <td>{{$item->user->mobile_number}}</td>
                    <td>{{$item->user->email}}</td>
                    <td>{{!empty($item->user->city->name)? $item->user->city->name : "-"}}</td>
                    <td>{{$item->user->sex}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>                  
</div>
@endsection