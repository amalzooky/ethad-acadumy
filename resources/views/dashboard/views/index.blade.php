@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.header.views') @stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">@lang('dashboard.header.views')</h3>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-striped hover datatable">
                            <thead class="table-dark">
                                <tr>
                                    <td>#</td>
                                    <td>الإسم</td>
                                    <td>رقم الجوال</td>
                                    <td>البريد اﻹلكتروني</td>
                                    <td>التعليق</td>
                                    <td>تاريخ التعليق</td>
                                    <td>@lang('global.status')</td>
                                    <td>@lang('global.table_action')</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($views as $index => $view)
                                <tr>
                                    <td>{{++$index}}</td>
                                    <td>{{$view->name}}</td>
                                    <td>{{$view->mobile}}</td>
                                    <td>{{$view->email}}</td>
                                    <td class="text-center">
                                        <button
                                            type="button"
                                            class="btn btn-outline-primary view-btn"
                                            data-toggle="modal"
                                            data-id="{{$view->id}}"
                                            data-view="{{$view->view}}"
                                            data-reply="{{isset($view->reply) ? $view->reply : ''}}"
                                            data-target="#ViewModal" data-whatever="@mdo">عرض التعليق</button>
                                    </td>
                                    <td>{{($view->created_at)}}</td>
                                    <td class="text-center">
                                        <label class="custom-switch">
                                        <input type="checkbox" name="is_active" {{$view->is_active ? 'checked' : ''}} data-id="{{$view->id}}" data-url="{{route('view.activation')}}" class="custom-switch-input activation" >
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" data-url="{{url('dashboard/views/' . $view->id)}}" data-areyousure="هل أنت متأكد ؟" class="btn btn-danger btn-sm dt-btn-delete"><i class="fe fe-trash-2" aria-hidden="true"></i></a>
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
        <div class="row">
            <div class="col">
                <div class="modal fade" id="ViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">التعليق</h5>
                        </div>
                        <form id="view-form"  method="post">
                            @csrf
                        <div class="modal-body">
                            <div class="form-group">
                              <label for="view" class="col-form-label">رأي ولي الأمر/الطالب</label>
                              <textarea class="form-control" id="view-text" name="view" disabled></textarea>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                              <label for="reply" class="col-form-label">الرد</label>
                              <textarea class="form-control" id="reply-text" name="reply" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">إغلاق</button>
                          <button type="submit" class="btn btn-outline-primary">إضافة الرد</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@stop
