@extends('dashboard.layouts.base')

@section('title') @lang('global.lecture_studens') ( {{$lecture->name}} ) @stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">@lang('global.lecture_studens') ( {{$lecture->name}} )</h3>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-striped hover datatable">
                            <thead class="table-dark">
                                <tr>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('dashboard.students.image')</th>
                                        <th>@lang('global.full_name')</th>
                                        <th>@lang('global.mobile_number')</th>
                                        <th>@lang('global.email')</th>
                                        <th>@lang('global.status')</th>
                                        @if ($fromVClassroom)<td>@lang('global.table_action')</td> @endif 
                                    </tr>
                                </tr>
                            </thead> 
                            <tbody>
                                @foreach ($lecture->subject->students as $index=>$student )
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td><img class="dt-img" src="{{asset($student->user->avatar)}}" /></td>
                                        <td>{{$student->user->full_name}}</td>
                                        <td>{{$student->user->mobile_number}}</td>
                                        <td>{{$student->user->email}}</td>
                                        <td class="text-center">
                                            @if($student->user->is_active)
                                                <i class="fe fe-check"></i>
                                            @else 
                                                <i class="fe fe-x"></i>
                                                @endif
                                        </td>
                                        @if ($fromVClassroom)
                                            <td>
                                            <button  data-scid="{{array2string(['student_id'=>$student->id,'classroom_id'=>$classroom->id])}}"    data-toggle="tooltip" data-placement="top" title="@lang('global.add_note_to_student')" type="button" class="btn btn-outline-primary btn-sm add-note-to-student">
                                                    <i class="fe fe-edit-3"></i>
                                                </button>
                                            </td> 
                                        @endif 
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


<!-- Modal -->
<div class="modal fade" id="modal_add_note_to_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ملاحظة الطالب</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               
              </button>
            </div>
            <div class="modal-body">
             <div class="form-group">
                 <label>@lang('global.note')</label>
                 <textarea style="height:200px;resize:none" class="form-control" placeholder="@lang('global.note')"></textarea>
             </div>
             @role("teacher")
             <div class="custom-controls-stacked">
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" name="show_when_student" value="1">
                      <span class="custom-control-label">عرض الملاحظة عندالطالب</span>
                    </label>
            </div>
            @endrole
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">@lang('global.Close')</button>
             @role("teacher")
              <button id="save-note-student" type="button" class="btn btn-outline-primary">@lang('global.save_note')</button>
            @endrole
            </div>
          </div>
        </div> 
      </div>
@endsection