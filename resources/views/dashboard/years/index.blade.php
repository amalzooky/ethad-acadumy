@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.header.academic_years') @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">@lang('dashboard.header.academic_years')</h3>
                    <div class="card-options">
                        <a href="{{ route('years.create') }}"><button class="btn btn-success pull-left">@lang('dashboard.academic_years.create') <i class="fe fe-plus" aria-hidden="true"></i></button></a>
                    </div>

                  </div>
                  <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-striped hover datatable">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <td>@lang('dashboard.academic_years.name')</td>
                                    <td>@lang('global.status')</td>
                                    <td>@lang('global.table_action')</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($years as $index => $year)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$year->name}}</td>
                                        <td class="text-center">
                                            <label class="custom-switch">
                                            <input type="checkbox" name="is_active" {{$year->is_active ? 'checked' : ''}} data-id="{{$year->id}}" data-url="{{route('years.activation')}}" class="custom-switch-input activation" >
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('years.edit', $year->id)}}" title="@lang('dashboard.academic_years.edit')" class="btn btn-primary btn-sm mb-2 mb-sm-0"><i class="fe fe-edit" aria-hidden="true"></i></a>
                                            <a href="javascript:void(0)" data-url="{{route('years.destroy', $year->id)}}" data-areyousure="هل أنت متأكد ؟" title="@lang('dashboard.major.delete')" class="btn btn-danger btn-sm dt-btn-delete"><i class="fe fe-trash-2" aria-hidden="true"></i></a>

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
