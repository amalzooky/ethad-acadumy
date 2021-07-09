@extends('dashboard.layouts.base')

@section('title') تصنيفات معرض الصور @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">تصنيفات معرض الصور</h3>
                    <div class="card-options">

                        <a href="{{ route('gallery-categories.create') }}"><button class="btn btn-success pull-left">إضافة تصنيف <i class="fe fe-plus" aria-hidden="true"></i></button></a>
                    </div>

                  </div>
                  <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-striped hover datatable">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <td>صورة الغلاف</td>
                                    <td>إسم التصنيف</td>
                                    <td>تاريخ المناسبة</td>
                                    <td>مكان المناسبة</td>
                                    <td>@lang("global.created_at")</td>
                                    <td>@lang('global.table_action')</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $index => $category)
                                    <tr>
                                        <td>{{++$index}}</td>
                                        <td><img src="{{$category->cover}}" class="dt-img"></td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->date}}</td>
                                        <td>{{$category->location}}</td>
                                        <td>{{($category->created_at)}}</td>
                                        <td class="text-center">
                                            <a href="{{route('gallery-categories.edit', $category->id)}}"  class="btn btn-primary btn-sm mb-2 mb-sm-0"><i class="fe fe-edit" aria-hidden="true"></i></a>
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
