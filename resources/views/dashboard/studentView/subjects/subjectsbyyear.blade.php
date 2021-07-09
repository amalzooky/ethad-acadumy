
@extends('dashboard.layouts.base')
@section('title') @lang('dashboard.header.subjects') @stop

@section('content')
    <div class="row">
        @foreach($subjects as $index => $subject)
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="h3">
                            <a href="#">{{$subject->name}} ( {{$subject->semester}} )</a>
                        </div>
                        <a href="{{route('student.subject.classrooms', (['subject_id'=>$subject->id]))}}"  class="btn btn-outline-primary btn-block btn-lg mb-2 mb-sm-0">
                            <i class="fe fe-video" aria-hidden="true"></i> مشاهدة الحصص
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop

