@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.header.honoraryboard') @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">@lang('dashboard.header.honoraryboard')</h3>
                    <div class="card-options">

                        <a href="{{ route('honoraryboards.create') }}"><button class="btn btn-success pull-left">@lang('dashboard.header.honoraryboard_create') <i class="fe fe-plus" aria-hidden="true"></i></button></a>
                    </div>

                  </div>
                  <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-striped hover datatable">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <td>@lang('dashboard.students.image')</td>
                                    <td>@lang('dashboard.students.name')</td>
                                    <td>@lang('dashboard.year_un')</td>
                                    <td>@lang('dashboard.header.major')</td>
                                    <td>@lang('dashboard.honoraryboards.university')</td>
                                    <td>@lang('dashboard.marker')</td>
                                    <td>@lang("global.created_at")</td>
                                    <td>@lang('global.status')</td>
                                    <td>@lang('global.table_action')</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($honoraryboards as $index => $honoraryboard)
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td><img src="{{$honoraryboard->image}}" class="dt-img"></td>
                                    <td>{{$honoraryboard->name}}</td>
                                    <td>{{$honoraryboard->year}}</td>
                                    <td>{{$honoraryboard->major}}</td>
                                    <td>{{$honoraryboard->university}}</td>
                                    <td>{{$honoraryboard->marker}}</td>
                                    <td>{{($honoraryboard->created_at)}}</td>
                                    <td class="text-center">
                                        <label class="custom-switch">
                                        <input type="checkbox" name="is_active" {{$honoraryboard->is_active ? 'checked' : ''}} data-id="{{$honoraryboard->id}}" data-url="{{route('honoraryboards.activation')}}" class="custom-switch-input activation" >
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('honoraryboards.edit', $honoraryboard->id)}}"  class="btn btn-primary btn-sm mb-2 mb-sm-0"><i class="fe fe-edit" aria-hidden="true"></i></a>
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
