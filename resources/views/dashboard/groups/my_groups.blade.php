@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.header.my_groups') @stop

@section('content')
<div class="container">
    <div class="row text-center">
        @foreach ($groups as $group)
        <div class="col-12 col-lg-2 mb-5">
            <a href="{{route('groups.show', $group->id)}}"><img src="{{$group->image}}" class="rounded-circle shadow-lg" width="125px" height="125px" alt=""></a>
            <div class="mt-2">
               <strong>{{$group->name}}</strong>
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop