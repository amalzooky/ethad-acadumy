@extends('dashboard.layouts.base')

@section('title') اخر الأخبار @endsection

@section('content')
    <div class="container">
        <div class="row">
            @foreach($allNews as $news)
            <div class="col-12 col-md-4">
                <div class="card p-3">
                    <a href="javascript:void(0)" class="mb-3">
                        <img src="{{$news->image}}" alt="Photo by Nathan Guerrero"  class="rounded" >
                    </a>
                    <div class="d-flex align-items-center px-2">
                        <div>
                            <div>
                                <h3 class="mb-0">
                                    <a href="{{route('student.show.news', $news->id)}}">{{str_limit($news->title)}}</a>
                                </h3>
                            </div>
                            <small class="d-block text-muted">{{($news->created_at)}}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div> <!-- end row -->
        <div class="rwo">
            <div class="col">
                {{$allNews->links()}}
            </div>
        </div>
    </div>
@stop
