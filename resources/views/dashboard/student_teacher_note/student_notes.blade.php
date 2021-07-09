@extends('dashboard.layouts.base')

@section('title') ملاحظاتي @endsection


@section('content')
    <div class="row">
        @foreach ($notes as $note)
        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-status bg-blue"></div>
                <div class="card-header">
                        <h3 class="card-title">
                          @if($note->student->user->getOriginal('sex') == 1)
                            الطالب: {{$note->student->user->full_name}}
                          @else
                          الطالبه: {{$note->student->user->full_name}}
                          @endif
                        </h3>
                      </div>
                <div class="card-body" style="height: 220px !important">
                    <p>{{str_limit($note->note, 255)}}</p>
                    @if(strlen($note->note) > 255)
                    <button type="button" class="btn btn-outline-primary btn-sm float-right show_note" data-note="{{$note->note}}" data-toggle="modal" data-target="#student_note">
                        إقرا المزيد
                    </button>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col">
            {{$notes->links()}}
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="modal fade" id="student_note" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="student_note_text"></p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop