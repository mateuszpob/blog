<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>BLog</title>
    </head>
    <body>
        <main>

        <h1>Blog</h1>
            @auth
                <p>Zalogowany</p>

                <a href="{{ route('logout') }}">Wyloguj</a>

            @else
                <p>Niezalogowany</p>
                <a href="{{ route('login') }}">Zaloguj</a>
                <br>
                <a href="{{ route('users.registerform') }}">Zarejestruj</a>
            @endauth

            @yield('content')
        </main>

        @section("scripts")

        @show
  </body>
</html>
