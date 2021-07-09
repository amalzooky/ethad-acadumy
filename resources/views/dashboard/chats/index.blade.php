@extends('dashboard.layouts.base')

@section('title') الرسائل @endsection

@section('css')
    <style>
        .header,
#headerMenuCollapse ,
.footer{
  display: none !important;
}</style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
        <chat-list chat-userslect="{{$chat}}" user-role="{{$role}}"></chat-list>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://www.gstatic.com/firebasejs/5.7.3/firebase.js"></script>
    <script>
         var config = {
            apiKey: "AIzaSyCvQ5U6FFNR-JJ199KvqaqLUL0b0PcpTFU",
            authDomain: "alrateb-a6ea5.firebaseapp.com",
            databaseURL: "https://alrateb-a6ea5.firebaseio.com",
            projectId: "alrateb-a6ea5",
            storageBucket: "",
            messagingSenderId: "65118355243"
        };
        firebase.initializeApp(config);

    </script>
    <script src="{{asset('js/app.js')}}"></script>    
    
@endsection