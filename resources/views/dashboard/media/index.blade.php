@extends('dashboard.layouts.base')

@section('title') @lang('dashboard.header.gallery') @endsection

@section('content')
    <iframe src="{{route('media.ifream')}}" class="media-ifream" style="width:100%;border:0;height:100vh" ></iframe>
@endsection