<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('dashboard/assets/css/font-awesome.min.css')}}">

    <link href="{{asset('dashboard/assets/css/dashboard.rtl.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/assets/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/assets/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/assets/css/select2-bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/assets/css/style.css')}}" rel="stylesheet" />
  </head>
  <body>
    <div class="page">
      <div class="page-main">
        <div class="my-3 my-md-5">
            <div class="container">
                @yield('content')
            </div>
        </div>
      </div>
    </div>

    <script src="{{asset('dashboard/assets/js/vendors/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/vendors/select2.min.js')}}"></script>
    <script src="{{asset('front/auth/register.js')}}"></script>

  </body>
</html>
