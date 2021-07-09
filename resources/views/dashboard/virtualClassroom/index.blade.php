@extends('dashboard.layouts.base')
@section('title') @lang('dashboard.header.classrooms') @stop

@section('content')
<div class="container">
  <div class="row">
    @foreach ($years as $year)
    <div class="col col-lg-4">
        <div class="card">
            <div class="card-body text-center">
            <div class="h3">
                <a href="{{route('getSubjectsByYear', $year->id)}}">{{$year->name}}</a>
            </div>
            <div class="h5 font-weight-bold mb-4">
                عدد البث المباشر ({{\App\VirtualClassroom::whereHas('lecture', function($q) use ($year){
                    $q->whereHas('subject', function($q2) use ($year){
                        $q2->whereHas('academicYear', function($q3) use ($year){
                            $q3->where('year', $year->year);
                        });
                    });
                })->count()}})
            </div>
            <div class="progress progress-sm">
                <div class="progress-bar bg-blue" style="width: 100%"></div>
            </div>
            </div>
        </div>
    </div>
    @endforeach
  </div>
</div>
@stop