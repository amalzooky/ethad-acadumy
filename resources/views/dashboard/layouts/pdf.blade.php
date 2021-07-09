<!DOCTYPE html>
<html lang="ar">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <style>

   body{
    font-family: 'Cairo', sans-serif;
   }
            table {
                border-collapse: collapse;
                border: 1px solid #ccc;
                width: 100%;
            }
    
            table thead {
                border: 1px solid #ccc;
             
            }
            table thead th{
                border: 1px solid #ccc;
                font-weight: 400;
             
            }
    

            table tr,
            td {
                border: 1px solid #ccc;
                padding: 10px;
                text-align: center;
                font-family: 'Cairo', sans-serif;
                color: #4d4d4d;
            }
     
        </style>
    <title>Export PDF File</title>
</head>

<body dir="rtl">
    <div class="container">
        @yield('pdfcontent')
    </div>
</body>

</html>