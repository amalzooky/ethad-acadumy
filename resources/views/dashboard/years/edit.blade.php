@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.academic_years.edit') @stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">@lang('dashboard.academic_years.edit')</h3>
                    <div class="card-options">
                        <a href="{{ route('years.index') }}"><button class="btn btn-info pull-left">@lang('dashboard.header.academic_years') <i class="fe fe-chevron-left" aria-hidden="true"></i></button></a>
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{route('years.update', $year->id)}}" method="POST" class="ajax">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">@lang('dashboard.academic_years.name')</label>
                            <div class="input-icon">  
                                <span class="input-icon-addon">
                                <i class="fe fe-book"></i>
                                </span>
                                <input type="text" class="form-control" id="name" name="name" placeholder="@lang('dashboard.academic_years.name')"  value="{{$year->name}}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">@lang('dashboard.academic_years.year')</label>
                            <select class="form-control custom-select academic-years"  name="year" required>

                                <option value="{{\Carbon\Carbon::now()->year-4}}" {{$year->year == \Carbon\Carbon::now()->year-4 ? 'selected' : ''}}>{{\Carbon\Carbon::now()->year-4}}</option>
                                <option value="{{\Carbon\Carbon::now()->year-3}}" {{$year->year == \Carbon\Carbon::now()->year-3 ? 'selected' : ''}}>{{\Carbon\Carbon::now()->year-3}}</option>
                                <option value="{{\Carbon\Carbon::now()->year-2}}" {{$year->year == \Carbon\Carbon::now()->year-2 ? 'selected' : ''}}>{{\Carbon\Carbon::now()->year-2}}</option>
                                <option value="{{\Carbon\Carbon::now()->year-1}}" {{$year->year == \Carbon\Carbon::now()->year-1 ? 'selected' : ''}}>{{\Carbon\Carbon::now()->year-1}}</option>
                                <option value="{{\Carbon\Carbon::now()->year}}" {{$year->year == \Carbon\Carbon::now()->year ? 'selected' : ''}}>{{\Carbon\Carbon::now()->year}}</option>
                                <option value="{{\Carbon\Carbon::now()->year+1}}" {{$year->year == \Carbon\Carbon::now()->year+1 ? 'selected' : ''}}>{{\Carbon\Carbon::now()->year+1}}</option>
                                <option value="{{\Carbon\Carbon::now()->year+2}}" {{$year->year == \Carbon\Carbon::now()->year+2 ? 'selected' : ''}}>{{\Carbon\Carbon::now()->year+2}}</option>
                                <option value="{{\Carbon\Carbon::now()->year+3}}" {{$year->year == \Carbon\Carbon::now()->year+3 ? 'selected' : ''}}>{{\Carbon\Carbon::now()->year+3}}</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <div class="form-label">@lang('global.status')</div>
                            <label class="custom-switch">
                                <input type="checkbox" name="is_active" id="is_active" class="custom-switch-input" {{$year->is_active ? 'checked' : ''}} value="1">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                        <button  type="submit" class="btn btn-primary btn-block mt-5">@lang('global.save')</button>
                    </form>
                  </div><!-- end card body -->
                </div>
            </div>
        </div> <!-- end row -->
    </div>
@endsection