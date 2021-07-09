@extends('dashboard.layouts.base')

@section('title') معرض الصور @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">معرض الصور</h3>
                    <div class="card-options">

                        <a href="{{ route('galleries.create') }}"><button class="btn btn-success pull-left">إضافة صورة/فيديو <i class="fe fe-plus" aria-hidden="true"></i></button></a>
                    </div>

                  </div>
                  <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-striped hover datatable">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <td>صورة\فيديو</td>
                                    <td>التصنيف</td>
                                    <td>الحالة</td>
                                    <td>@lang("global.created_at")</td>
                                    <td>@lang('global.table_action')</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($galleries as $index => $gallery)
                                    <tr>
                                        <td>{{++$index}}</td>
                                        <td>
                                            @if($gallery->media_type == 1)
                                            <img src="{{$gallery->media}}" class="dt-img">
                                            @else
                                            <a href="{{$gallery->media}}">فيديو</a>
                                            @endif

                                        </td>
                                        <td>
                                            {{$gallery->category->name}}
                                        </td>
                                        <td class="text-center">
                                            <label class="custom-switch">
                                            <input type="checkbox" name="is_active" {{$gallery->is_active ? 'checked' : ''}} data-id="{{$gallery->id}}" data-url="{{route('gallery.activation')}}" class="custom-switch-input activation" >
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </td>
                                        <td>{{($gallery->created_at)}}</td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-url="{{route('galleries.destroy', $gallery->id)}}" data-areyousure="هل أنت متأكد ؟"  class="btn btn-danger btn-sm dt-btn-delete"><i class="fe fe-trash-2" aria-hidden="true"></i></a>
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
