<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data["title"]}}</title>
</head>
<style>
    body{
        margin: 0;
    }
    iframe{
        border: 0;
        width: 100%;
        height: 100vh
    }
</style>
<body>
    
<iframe  src="{{$data["url"]}}"></iframe>
</body>
</html>