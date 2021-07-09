@extends('dashboard.layouts.base')

@section('title') {{$news->title}} @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-profile">
                    <div class="card-header" style="background-image: url({{$news->image}}); height: 25rem"></div>
                    <div class="card-body text-center">
                        <h3 class="mb-3">{{$news->title}}</h3>
                        <p class="mb-2">
                        {{dateForhuman($news->created_at)}}
                        </p>
                    </div>
                    <div class="card-body text-center">
                        {!! $news->body !!}
                    </div>
                </div>
            </div>
        </div> <!-- end row -->
    </div>
@stop
