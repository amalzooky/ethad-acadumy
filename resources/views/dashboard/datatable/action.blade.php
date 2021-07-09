<a href="{{route('students.edit', $id)}}" title="@lang('dashboard.students.edit')" class="btn btn-primary btn-sm mb-2 mb-sm-0"><i class="fe fe-edit" aria-hidden="true"></i></a>
@if($student->user->facebook_url)
<a href="https://m.me/{{isset(explode('/',$student->user->facebook_url)[count(explode('/',$student->user->facebook_url))-1])?explode('/',$student->user->facebook_url)[count(explode('/',$student->user->facebook_url))-1]:""}}"  target="_blank" class="btn btn-info btn-sm"><i class="fe fe-facebook" aria-hidden="true"></i></a>
@endif

<a href="{{route('student.notes', $id)}}" title="ملاحظات الطالب" class="btn btn-success btn-sm mb-2 mb-sm-0"><i class="fe fe-edit-2" aria-hidden="true"></i></a>


@can('managment_chats')
{{--<a  target="_blank" href="{{url('/dashboard/chats/' . ['to_type'=>'students','to_id'=>$student->user->id])}}" class="btn btn-warning btn-sm "><i class="fe fe-message-circle" aria-hidden="true"></i></a>--}}
@endcan


