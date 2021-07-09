@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.header.role_create') @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    <h3 class="card-title">@lang('dashboard.header.role_create')</h3>
                    <div class="card-options">
                        <a href="{{ route('roles.index') }}"><button class="btn btn-info pull-left">@lang('dashboard.header.roles') <i class="fe fe-chevron-left" aria-hidden="true"></i></button></a>
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="{{route('roles.store')}}" method="POST" class="ajax" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">@lang('dashboard.roles.name')</label>
                            <div class="input-icon">  
                                <span class="input-icon-addon">
                                <i class="fe fe-zap"></i>
                                </span>
                                <input type="text" class="form-control" id="name" name="name" placeholder="@lang('dashboard.roles.name')"  value="{{old('name')}}" required autofocus>
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label for="name" class="form-label">@lang('dashboard.roles.permissions')</label>
                            <div class="row">
                                @foreach ($permissions as $permission)
                                    <div class="col-sm-6 col-md-3" style="margin-top:10px">
                                        <label class="custom-switch">
                                            <span> 
                                                <span class="role-name">@lang('dashboard.permissions.'.$permission)</span> 
                                                <input type="checkbox" name="permissions[{{$permission}}]" id="{{$permission}}" class="custom-switch-input" value="{{$permission}}">
                                                <span class="custom-switch-indicator"></span>
                                            </span>
                                        </label>    
                                    </div>                           
                                @endforeach  
                        </div>       
                        </div>

                        <button  type="submit" class="btn btn-primary btn-block mt-5">@lang('global.save')</button>
                    </form>
                  </div><!-- end card body -->
                </div>
            </div>
        </div> <!-- end row -->
    </div>
@endsection