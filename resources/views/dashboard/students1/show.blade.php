@extends('dashboard.layouts.base')

@section('title') بيانات الطالب @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-status bg-blue"></div>
                    <div class="card-body">
                        <h3>مواد الطالب</h3>
                        <ol>
                            @foreach ($student->subjects as $subject)
                            <li>{{$subject->name}} / {{$subject->major->name}} / {{$subject->semester}}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->
        <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-status bg-blue"></div>
                        <div class="card-body">
                            <div class="row"> <!-- Start Row -->
                                <div class="col-sm-12 col-md-6">
                                    <label><strong>@lang("global.full_name") </strong> : {{$student->user->full_name}}</label>  
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label><strong>@lang("global.email") </strong> : {{$student->user->email}}</label> 
                                </div>
                            </div> <!-- End Row -->
                            <div class="row"> <!-- Start Row -->
                                <div class="col-sm-12 col-md-6">
                                    <label><strong>@lang("global.mobile_number") </strong> : {{$student->user->mobile_number}}</label>  
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label><strong>@lang("global.telephone_number") </strong> : {{!empty($student->user->telephone_number)? $student->user->telephone_number : "-"}}</label>  
                                </div>
                            </div> <!-- End Row -->
                            <div class="row"> <!-- Start Row -->
                                <div class="col-sm-12 col-md-6">
                                    <label><strong>@lang("global.city") </strong> : {{!empty($student->user->city->name)? $student->user->city->name : "-"}}</label>  
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label><strong>@lang("global.date_of_birth") </strong> : {{!empty($student->user->date_of_birth)? $student->user->date_of_birth : "-"}}</label>  
                                </div>
                            </div> <!-- End Row -->
                            <div class="row"> <!-- Start Row -->
                                <div class="col-sm-12 col-md-6">
                                    <label><strong>@lang("global.sex") </strong> : {{!empty($student->user->sex)? $student->user->sex : "-"}}</label>  
                                </div>
                                <div class="col-sm-12 col-md-6">
                                <label><strong>المدرسة </strong> : {{isset($student->school) ? $student->school->name : ''}}</label>  
                                    </div>
                              </div> <!-- End Row -->
                            <div class="row"> <!-- Start Row -->
                                <div class="col-sm-12 col-md-6">
                                        <label><strong>@lang("global.facebook_url") </strong> : <a  class="btn btn-outline-primary btn-sm" href="{{!empty($student->user->facebook_url)? $student->user->facebook_url : "javascript:void(0)"}}"  target="{{!empty($student->user->facebook_url)? '_blank' : ""}}">{{!empty($student->user->facebook_url)? 'الدخول الي الفيس البوك' : "لا يوجد فيس بوك"}}</a></label>  
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label><strong>فيس بوك ولي الأمر </strong> : <a class="btn btn-outline-primary btn-sm" href="{{!empty($student->facebook_parent )? $student->facebook_parent  : "javascript:void(0)"}}" target="{{!empty($student->facebook_parent )? '_blank'  : ""}}">{{!empty($student->facebook_parent )? 'الدخول الي الفيس بوك'  : "لا يوجد فيس بوك"}}</a></label>  
                                </div>

                              </div> <!-- End Row -->
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->
    </div>
@endsection