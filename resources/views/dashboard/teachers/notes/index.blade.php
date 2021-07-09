@extends('dashboard.layouts.base')

@section('title') ملاحظات المعلم @endsection
@section('content')


    <div class="container"> 
        <div class="row">
            <div class="col"> 
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">ملاحظات المعلم</h3>
                    <div class="card-options">
                        <a href="{{route('teachers.notes.create', $id)}}">
                        <button class="btn btn-success pull-left">إنشاء ملاحظة <i class="fe fe-plus" aria-hidden="true"></i></button>
                        </a>
                    </div>

                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped hover" id="">
                            <thead class="table-dark">
                                <tr>
                                    <td>id</td>
                                    <td>الملاحظة</td>
                                    <td>الحالة</td>
                                    <td>@lang("global.created_at")</td>
                                    <td>@lang('global.table_action')</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notes as $index => $note)
                                    <tr>
                                        <td>{{++$index}}</td>
                                        <td>{{$note->note}}</td>
                                        <td class="text-center">
                                            <label class="custom-switch">
                                            <input type="checkbox" name="is_active" {{$note->is_active ? 'checked' : ''}} data-id="{{$note->id}}" data-url="{{route('teachers.notes.activation')}}" class="custom-switch-input activation" >
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </td>
                                        <td>{{formatDT($note->created_at)}}</td>
                                        <td class="text-center">
                                            <a href="{{route('teachers.notes.edit', $note->id)}}" class="btn btn-primary btn-sm mb-2 mb-sm-0"><i class="fe fe-edit" aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-url="{{route('teachers.notes.delete', $note->id)}}" data-areyousure="هل أنت متأكد ؟" class="btn btn-danger btn-sm dt-btn-delete"><i class="fe fe-trash-2" aria-hidden="true"></i></a>
                                        </td>
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
@endsection

