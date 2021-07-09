@extends('dashboard.layouts.base')

@section('title') {{$teacher->user->full_name}} @stop

@section('content')
<div class="container">
    <div class="rwo">
        <div class="col">
                <div class="card">
                        <div class="card-status bg-blue"></div>
                        <div class="card-body">
                          <div class="row"> <!-- Start Row -->
                            <div class="col-sm-12 col-md-6">
                                <label><strong>@lang("global.full_name") </strong> : {{$teacher->user->full_name}}</label>  
                            </div>
                            <div class="col-sm-12 col-md-6">
                              <label><strong>@lang("global.email") </strong> : {{$teacher->user->email}}</label> 
                            </div>
                          </div> <!-- End Row -->
              
                          <div class="row"> <!-- Start Row -->
                            <div class="col-sm-12 col-md-6">
                                <label><strong>@lang("global.mobile_number") </strong> : {{$teacher->user->mobile_number}}</label>  
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label><strong>@lang("global.telephone_number") </strong> : {{!empty($teacher->user->telephone_number)? $teacher->user->telephone_number : "-"}}</label>  
                            </div>
                          </div> <!-- End Row -->
              
                          <div class="row"> <!-- Start Row -->
                            <div class="col-sm-12 col-md-6">
                                <label><strong>@lang("global.city") </strong> : {{!empty($teacher->user->city->name)? $teacher->user->city->name : "-"}}</label>  
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label><strong>@lang("global.date_of_birth") </strong> : {{!empty($teacher->user->date_of_birth)? $teacher->user->date_of_birth : "-"}}</label>  
                            </div>
                          </div> <!-- End Row -->

                          <div class="row"> <!-- Start Row -->
                            <div class="col-sm-12 col-md-6">
                                <label><strong>@lang("global.sex") </strong> : {{!empty($teacher->user->sex)? $teacher->user->sex : "-"}}</label>  
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label><strong>@lang("global.facebook_url") </strong> : <a href="">{{!empty($teacher->user->facebook_url)? $teacher->user->facebook_url : ""}}</a></label>  
                            </div>
                          </div> <!-- End Row -->
              
                        </div>
                        
                    </div>
        </div>
    </div>

    <div class="rwo">
        <div class="col">
          <div class="card">
            <div class="card-status bg-blue"></div>
            <div class="card-header">
                <h3 class="card-title">ملاحظات الطلاب</h3>
              </div>
            <div class="card-body">
              <div class="row">
                @foreach ($notes as $note)
                  <div class="col-md-6 col-xl-4">
                      <div class="card">
                        <div class="card-status card-status-left bg-blue"></div>
                        <div class="card-header">
                          <h3 class="card-title">
                            @if($note->student->user->getOriginal('sex') == 1)
                              الطالب: {{$note->student->user->full_name}}
                            @else
                            الطالبه: {{$note->student->user->full_name}}
                            @endif
                          </h3>
                        </div>
                        <div class="card-body">
                          <p>{{$note->note}}</p>
                        </div>
                      </div>
                  </div>
                  @endforeach
              </div> 
              {{$notes->links()}}       
            </div>        
          </div>
        </div>
    </div>
</div>
@stop