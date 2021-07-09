@extends('dashboard.layouts.base')
@section('title') @lang('dashboard.header.subjects') @stop

@section('content')
<div class="container">
        <div class="row">
      @foreach ($years as $year)
      <div class="col col-lg-4">
            <div class="card">
                <div class="card-body text-center">
                <div class="h3">
                    <a href="{{route('get.subjects.by.year',[$year->year])}}">{{$year->name}}</a>
                </div>
                
                <div class="h5 font-weight-bold mb-4">
                     المواد
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