@extends('dashboard.layouts.base')

@section('title') إنشاء ملاحظة @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">إنشاء ملاحظه</h3>
                    <div class="card-options">
                        <a href="{{ route('student.notes', $id) }}"><button class="btn btn-info pull-left">ملاحظات الطالب <i class="fe fe-chevron-left" aria-hidden="true"></i></button></a>
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{route('student.notes.store')}}" method="POST" class="ajax">
                        @csrf
                        <input type="hidden" name="student_id" value="{{$id}}">
                        <div class="form-group">
                            <label for="note" class="form-label">الملاحظة</label>
                            <textarea class="form-control" id="note" name="note" rows="5" placeholder="الملاحظة..." required></textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-label">عرض الملاحظة للطالب ؟</div>
                            <label class="custom-switch">
                                <input type="checkbox" name="is_active" id="is_active" class="custom-switch-input" value="1">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                        <button  type="submit" class="btn btn-primary btn-block mt-5">@lang('global.save')</button>
                    </form>
                  </div><!-- end card body -->
                </div>
            </div>
        </div> <!-- end row -->
    </div>
@endsection