@extends('frontend.layouts.base2')

@section('title')
تم إرسال رسالتك بنجاح, شكرا لتواصلك معنا
@endsection
@section('content')
@if (session('success'))
<div class="container-fluid">
   <div class="row">
      <div class="col-12 px-0 text-center">
         <div class="alert alert-success  alert-dismissible fade show" role="alert">
            <b>{{session('success')}}</b>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
         </div>
      </div>
   </div>
</div>
@endif
@endsection
