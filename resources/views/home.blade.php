@extends('layouts.main')

@section('content')
    <div>
        <h1>Blog</h1>

        @auth
            <p>Zalogowany</p>

            <a href="{{ route('users.create') }}">Dodaj użytkownika</a>
            <br>
            <a href="{{ route('get.users') }}">Pokaż użytkowników</a>

        @else
            <p>Niezalogowany</p>
            <a href="{{ route('login') }}">Zaloguj</a>
            <br>
            <a href="{{ route('users.registerform') }}">Zarejestruj</a>
        @endauth

    </div>
@endsection
