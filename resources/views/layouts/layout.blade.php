<!DOCTYPE html>
<html lang="ua">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        @stack('css')
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>

<body>
    
    @yield('content')

</body>

</html>
