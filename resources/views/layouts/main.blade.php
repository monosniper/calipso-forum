<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/main.css')
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital@1&display=swap" rel="stylesheet">
    @yield('css')
</head>

<body>
<header>
    <!--NavBar Section-->
    @include('inc.header')
    @auth
        @include('inc.invites')
    @endauth
    <!--SearchBox Section-->
    @yield('search')
</header>
<div class="container">
    @include('inc.ads')
    @yield('content')
</div>

<!-- Forum Info -->
@include('inc.info')

@include('inc.footer')

@auth
    <div class="portlet portlet-default" id="support"></div>
@endauth

@vite('resources/js/app.js')
</body>
</html>
