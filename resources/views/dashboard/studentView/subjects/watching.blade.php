<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <META HTTP-EQUIV="Access-Control-Allow-Origin" CONTENT="http://127.0.0.1:8000">
    <title>{{$data['title']}}</title>


<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
        }
    
    
    
        iframe{
            border: 0;
            margin: 0;
            width:100%;
        }
        .card{
           
        }
        .card-body{
            padding: 0;
        }
    
        .wiz{
            color: #0083c6;
            font-weight: bold
        }
    
        .iq{
            color: #f58220;
            font-weight: bold
        }
    
        </style>

</head>

<body>
    
    <div class="container-fluid ">
            <div class="card mt-2">
                    <div class="card-header">
                        <h3 class="mb-0 float-left"><span class="wiz">Wiz</span><span class="iq">IQ</span></h3>
                        {{-- <button class="float-right btn btn-danger" onclick="toggleFullScreen(document.body)">full</button> --}}
                    </div>
                    @if(isset($data['wiziq_url']))
                    <div class="card-body">
                        
                        <iframe  src="{{$data['wiziq_url']}}" ></iframe>
                    </div>
                    @endif
                </div>
                
                @if(isset($data['webinar_url']))
                <div class="card mt-2">
                        <div class="card-header">
                                Featured
                              </div>
                    <div class="card-body">
                        <iframe id="webinar_url" src="{{$data['webinar_url']}}" id="webinar_url">

                        </iframe>
                    </div>
                </div>
                @endif
    </div>
    <div id="myDialog"></div>
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script>
        $("iframe").height($(window).height());         
    </script>
</body>
</html>

