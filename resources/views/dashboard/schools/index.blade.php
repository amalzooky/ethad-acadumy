@extends('dashboard.layouts.base')

@section('title') المدارس @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">الفرق الدراسية</h3>
                    <div class="card-options">
                        <a href="{{ route('schools.create') }}"><button class="btn btn-success pull-left">اضافة فرقة <i class="fe fe-plus" aria-hidden="true"></i></button></a>
                    </div>

                  </div>
                  <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-striped hover datatable">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <td>إسم الفرقه الدراسية</td>
                                    <td>@lang("global.created_at")</td>
                                    <td>@lang("global.updated_at")</td>
                                    <td>@lang('global.table_action')</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($schools as $index => $school)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$school->name}}</td>
                                    <td>{{($school->created_at)}}</td>
                                    <td>{{($school->updated_at)}}</td>
                                    <td class="text-center">
                                        <a href="{{route('schools.edit', $school->id)}}" class="btn btn-primary btn-sm mb-2 mb-sm-0"><i class="fe fe-edit" aria-hidden="true"></i></a>
                                        <a href="javascript:void(0)" data-url="{{route('schools.destroy', $school->id)}}" data-areyousure="هل أنت متأكد ؟" title="@lang('dashboard.major.delete')" class="btn btn-danger btn-sm dt-btn-delete"><i class="fe fe-trash-2" aria-hidden="true"></i></a>
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
