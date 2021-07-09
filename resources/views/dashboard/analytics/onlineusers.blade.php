@extends('dashboard.layouts.base')

@section('title') المستخدمين النشطين @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">المستخدمين النشطين</h3>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-striped hover datatable">
                            <thead class="table-dark">
                                <tr>
                                    <td>id</td>
                                    <td>صورة شخصية</td>
                                    <td>اﻹسم</td>
                                    <td>البريد اﻹلكتروني</td>
                                    <td>رقم الهاتف</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($onlineUsers as $index => $user)
                                    <tr>
                                        <td>{{++$index}}</td>
                                        <td>
                                            <div class="avatar d-block" style="background-image: url('{{asset($user->avatar)}}')">
                                                <span class="avatar-status bg-green"></span>
                                            </div>
                                        </td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->mobile_number}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                  </div><!-- end card body -->
                </div>
            </div>
        </div> <!-- end row -->
    </div>

@stop