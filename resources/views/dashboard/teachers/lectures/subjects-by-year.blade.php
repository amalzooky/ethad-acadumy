@extends('dashboard.layouts.base')
@section('title') @lang('dashboard.header.subjects') @stop

@section('content')
<div class="container">
  <div class="row">
      <div class="col">
          <div class="card">
            <div class="card-status bg-blue"></div>
            <div class="card-header">
              <h3 class="card-title">@lang('dashboard.header.subjects')</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive-sm">
                  <table class="table table-bordered table-striped hover datatable">
                      <thead class="table-dark">
                          <tr>
                              <td class="w-1">#</td>
                              <td>المادة</td>
                              <td>التخصص</td>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($subjects as $index => $subject)
                          <tr>
                              <td>{{++$index}}</td>
                          <td><a href="{{route('teacher.get.lectures',array2string(['subject_id'=>$subject->id]))}}">{{$subject->name}} / {{$subject->semester}}</a></td>
                              <td>{{$subject->major->name}}</td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
            </div><!-- end card body -->
          </div>
      </div>
  </div>
</div>
@stop
