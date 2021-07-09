<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('/dashboard/assets/css/jquery-ui.min.css')}}" >
    <link href="{{ asset('/dashboard/assets/css/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/packages/barryvdh/elfinder/css/elfinder.min.css')}}" >

    <title>Media</title>
    <style>
        body{
            margin: 0;
        }
    </style>
</head>

<body>
    <div id="elfinder-media" class="el-fullscreen"></div>

    <script src="{{asset('/dashboard/assets/js/vendors/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('/dashboard/assets/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('/dashboard/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('/packages/barryvdh/elfinder/js/elfinder.min.js')}}" ></script>
    <script src="{{asset('/packages/barryvdh/elfinder/js/i18n/elfinder.ar.js')}}" ></script>


<script>
    $(function(){
        $elf = $('#elfinder-media').elfinder({
          lang:"ar",
          customData: { _token: '<?= csrf_token() ?>'},
          url : '<?= url('elfinder/connector') ?>',  
          resizable: false,
          rememberLastDir: false,
          useBrowserHistory: false,
          onlyMimes: ["image"],
          commands : [
            'open','reload', 'home', 'up', 'back', 'forward', 
            'download', 'rm', 'mkdir', 'upload', 'copy', 
            'paste', 'edit', 'search','rename', 'info', 'view',
            'resize', 'sort'
          ],
          uiOptions : {
          toolbar : [
            ['back', 'forward'],
            ['reload'],
            ['mkdir', 'mkfile', 'upload'],
            ['open', 'download', 'getfile'],
            ['info'],
            ['quicklook'],
            ['copy', 'cut', 'paste'],
            ['rm'],
            ['duplicate', 'rename', 'edit', 'resize'],
            ['extract', 'archive'],
            ['search'],
            ['view'],
            ['help']
          ],
        },
      });
      $('.elfinder-button[title]').attr('data-toggle', 'tooltip');
  
          $('.elfinder-button[title]').attr('data-toggle', 'tooltip');
         
          resizeElFinder();
          $(window).resize(resizeElFinder);
        });

        function resizeElFinder()
      {
        $elf.height(parseInt($(window).height()) - 55 ).resize();
      } 
    </script>
</body>
</html>