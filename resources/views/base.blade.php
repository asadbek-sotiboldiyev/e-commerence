<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Lara-shop')</title>
</head>
<body>
    <header>
        <h1>
            <a href="/">Lara-market</a>
        </h1>
        <nav>
            <a href="{{ route('shopIndex') }}">Do'konlar</a>
            @auth
                <a href="{{ route('profile') }}">Profil</a>
                <a href="{{ route('logout') }}">Chiqish</a>
            @endauth
            @guest
                <a href="{{ route('login') }}">Kirish</a>
            @endguest
        </nav>
    </header>
    <hr>

    @yield('content')
</body>
</html>