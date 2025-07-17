<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
 
    <title>starting file</title>
    <style>
        body{
            padding: 5px;
            overflow-x: hidden;
        }
        a{
            text-decoration: none;
        }
        #home-collapse,#dashboard-collapse,#orders-collapse > ul > li > a{
            margin-left:20px;
            text-decoration: none;
        }
        #home-collapse > ul > li > a:hover,
        #dashboard-collapse > ul > li > a:hover,
        #orders-collapse > ul > li > a:hover {
            background-color: rgb(111 177 116 / 45%);
            padding: 5px;
        }
        
    </style>
</head>
<body>
    <x-layouts.header/>
    <x-layouts.sidebar/>

    <div class="col-md-9 mt-4">
               {{ $slot }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/fontawesome.min.js"></script>
</body>
</html>