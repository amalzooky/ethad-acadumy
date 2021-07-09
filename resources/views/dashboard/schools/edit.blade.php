@extends('dashboard.layouts.base')

@section('title') تعديل بيانات المدرسة @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">إضافة مدرسة</h3>
                    <div class="card-options">
                        <a href="{{ route('schools.index') }}"><button class="btn btn-info pull-left">المدارس <i class="fe fe-chevron-left" aria-hidden="true"></i></button></a>
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{route('schools.update', $school->id)}}" method="POST" class="ajax">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="name" class="form-label">إسم المدرسة</label>
                            <div class="input-icon">  
                                <span class="input-icon-addon">
                                <i class="fe fe-book"></i>
                                </span>
                                <input type="text" class="form-control" id="name" name="name" placeholder="المدرسة"  value="{{$school->name}}" required autofocus>
                            </div>
                        </div>
                        <button  type="submit" class="btn btn-primary btn-block mt-5">@lang('global.save')</button>
                    </form>
                  </div><!-- end card body -->
                </div>
            </div>
        </div> <!-- end row -->
    </div>
@endsection