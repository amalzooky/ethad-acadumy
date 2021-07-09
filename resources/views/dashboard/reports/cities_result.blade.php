@extends('dashboard.layouts.base')

@section('title') النتجية @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                  <div class="card-status bg-blue"></div>
                  <div class="card-header">
                    
                    <h3 class="card-title">نتيجة المدينة : {{$name}}</h3>
                    
                  </div>
                  <div class="card-body text-center">
                    <h1>عدد الطلاب في المدينة : {{$count}}</h1>
                  </div><!-- end card body -->
                </div>
            </div>
        </div> <!-- end row -->
    </div>
@endsection