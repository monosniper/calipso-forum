<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/main.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital@1&display=swap" rel="stylesheet">
    @yield('css')
</head>

<body>
<header>
    <!--NavBar Section-->
    @include('inc.header')
    <!--SearchBox Section-->
    @yield('search')
</header>
<div class="container">
    @yield('content')
</div>

<!-- Forum Info -->
@include('inc.info')

@include('inc.footer')
@vite('resources/js/app.js')
</body>
</html>
