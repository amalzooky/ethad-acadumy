@extends('dashboard.layouts.base')

@section('title') الملاحظة @endsection
@section('content')


    <div class="container"> 
        <div class="row">
            <div class="col"> 
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">ملاحظتك</h3>
                  </div>
                  <div class="card-body">
                    <form action="{{route('student.teacher.note.store')}}" method="post" class="ajax">
                        @csrf
                        <input type="hidden" name="teacher_id" value="{{$id}}">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="note" class="form-label">أكتب ملاحظتك هنا</label>
                                    <textarea name="note" id="note" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                <div class="form-label">عرض الملاحظة للمعلم؟</div>
                                <label class="custom-switch">
                                    <input type="checkbox" name="is_teacher_show" id="is_teacher_show" class="custom-switch-input" value="1">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-block">حفظ</button>
                            </div>
                        </div>
                    </form>
                  </div><!-- end card body -->
                </div>
            </div>
        </div> <!-- end row -->
    </div>
@endsection

