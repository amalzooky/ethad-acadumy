@extends('dashboard.layouts.base')

@section('title') @lang('global.inbox') @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">@lang('global.inbox')</h3>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-striped hover datatable">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <td>@lang('dashboard.messages.name')</td>
                                    <td>@lang('global.email')</td>
                                    <td>رقم الهاتف</td>
                                    <td>@lang('dashboard.messages.message')</td>
                                    <td>@lang('global.table_action')</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $index => $message)
                                    <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$message->name}}</td>
                                    <td class="text-center">
                                        <a class="btn btn-outline-primary btn-sm px-5" data-toggle="tooltip" data-placement="top" title="إرسل رسالة الي {{$message->name}}" target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to={{$message->email}}">
                                            الرد على الرسالة
                                        </a>
                                    </td>
                                    <td>{{$message->mobile}}</td>
                                    <td><a href="javascript:void(0)" data-toggle="modal" data-title="{{$message->name}}" id="message" data-message="{{$message->message}}" data-target="#messageModal" class="message-contact-us">{{str_limit($message->message)}}</a></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-url="{{route('messages.destroy',$message->id)}}" data-areyousure="هل أنت متأكد ؟"  class="btn btn-danger btn-sm dt-btn-delete"><i class="fe fe-trash-2" aria-hidden="true"></i></a>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                        <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                </div>
                            </div>
                            </div>
                      </div>
                  </div><!-- end card body -->
                </div>
            </div>
        </div> <!-- end row -->
    </div>
@endsection