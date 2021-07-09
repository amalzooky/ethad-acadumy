@extends('dashboard.layouts.base')

@section('title') الشرائح @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">الشرائح</h3>
                    <div class="card-options">
                        <a href="{{ route('sliders.create') }}"><button class="btn btn-success pull-left">اضافة شريحة <i class="fe fe-plus" aria-hidden="true"></i></button></a>
                    </div>

                  </div>
                  <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-striped hover datatable">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <td>الصورة</td>
                                    <td>الحالة</td>
                                    <td>@lang("global.created_at")</td>
                                    <td>@lang('global.table_action')</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($slides as $index => $slide)
                                    <tr>
                                        <td>{{++$index}}</td>
                                        <td><img style="width: 150px; height: 100px;" src="{{$slide->image}}">

                                        <td class="text-center">
                                            <label class="custom-switch">
                                            <input type="checkbox" name="is_active" {{$slide->is_active ? 'checked' : ''}} data-id="{{$slide->id}}" data-url="{{route('sliders.activation')}}" class="custom-switch-input activation" >
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </td>
                                        <td>{{$slide->created_at}}</td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" data-url="{{route('sliders.delete', $slide->id)}}" data-areyousure="هل أنت متأكد ؟" title="@lang('dashboard.major.delete')" class="btn btn-danger btn-sm dt-btn-delete"><i class="fe fe-trash-2" aria-hidden="true"></i></a>
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
