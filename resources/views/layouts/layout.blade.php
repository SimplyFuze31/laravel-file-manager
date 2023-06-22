<!DOCTYPE html>
<html lang="ua">

<head>
    <meta charset="UTF-8">
    
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon"/>

    {{-- for ngrok --}}
    {{-- <link rel="stylesheet" href=" https://e631-185-177-191-181.ngrok-free.app/css/app.css" type="text/css"> --}}
    <link  href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    

    @yield('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        
    @section("scripts")

    @show
</body>

</html>
