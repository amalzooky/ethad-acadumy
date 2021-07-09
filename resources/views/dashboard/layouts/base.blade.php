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
    <link href="{{asset('dashboard/assets/css/fonts/cairo.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('dashboard/assets/css/font-awesome.min.css')}}">

    <!-- Dashboard Core -->
    <link href="{{asset('dashboard/assets/css/dashboard.rtl.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/assets/css/ladda-themeless.min.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/assets/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/assets/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/assets/css/select2-bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/assets/css/bootstrap-select.min.css')}}" rel="stylesheet" />

    <link href="{{asset('dashboard/assets/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" />
    <link href="{{asset('dashboard/assets/css/iziToast.min.css')}}" rel="stylesheet" />
    @yield('css')
    <link href="{{asset('dashboard/assets/css/style.css')}}" rel="stylesheet" />


    <script> const app_root = "{{url('/')}}"; </script>
  </head>
  <body>
    <div class="page" id="app">
      <div class="page-main">
        @include('dashboard.includes.top_header')
        @include('dashboard.includes.header')

        <div class="my-3 my-md-5">
            <div class="container">
                @yield('content')
            </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12  text-center">
              {{\Carbon\Carbon::now()->year}}
            </div>
          </div>
        </div>
      </footer>
    </div>

    <script src="{{asset('dashboard/assets/js/vendors/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/vendors/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/vendors/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/vendors/bootstrap-validator.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/vendors/spin.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/vendors/ladda.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/jquery.colorbox-min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/vendors/sweetalert.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/vendors/select2.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/vendors/bootstrap-select.min.js')}}"></script>

    <script src="{{asset('dashboard/assets/js/moment.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/vendors/iziToast.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/helpers/functions.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/dashboard.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/jquery.repeater.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('dashboard/assets/js/form-repeater.js')}}"></script>
    @yield('js')
    <script>

      @if(session()->has('success'))
        iziToast.success({
          message: '{{session()->get('success')}}',
          position: 'topRight'
        });
      @endif
    </script>
  </body>
</html>
