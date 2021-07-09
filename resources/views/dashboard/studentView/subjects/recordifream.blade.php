<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data['title']}}</title>

<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

</head>
<style>
    *{
        margin: 0;
        padding: 0;
        font-family: 'Roboto', sans-serif;
    }
    *:fullscreen
*:-ms-fullscreen,
*:-webkit-full-screen,
*:-moz-full-screen {
   overflow: auto !important;
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



    </style>
<body>
    
    <div class="container-fluid ">
            <div class="card mt-2">
                    <div class="card-header">
                        <h3 class="mb-0 float-left">Record </span></h3>
           
                    </div>
                    <div class="card-body">

                        <iframe  src="{{$data['record_url']}}" ></iframe>
                    </div>
                </div>
            

    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $("iframe").height($(window).height()-100);

            $("body").on("contextmenu",function(e){
       return false;
    }); 

    </script>
</body>
</html>

