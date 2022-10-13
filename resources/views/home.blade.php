@extends('layouts.main')

@section('content')
    <div>
        <h1>Blog</h1>

        <a href="?page={{ app('request')->has('page') && app('request')->input('page') > 1 ? (app('request')->input('page')) - 1 : 1 }}">Bliżej</a>
        <a href="?page={{ app('request')->has('page') ? (app('request')->input('page')) + 1 : 2 }}">Dalej</a>

        @foreach ($posts as $post)
            <div>
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->body }}</p>
            </div>
        @endforeach

        <a href="?page={{ app('request')->has('page') && app('request')->input('page') > 1 ? (app('request')->input('page')) - 1 : 1 }}">Bliżej</a>
        <a href="?page={{ app('request')->has('page') ? (app('request')->input('page')) + 1 : 2 }}">Dalej</a>
        @auth
            <p>Zalogowany</p>

            <a href="{{ route('blog.createpostform') }}">Dodaj post</a>
            <br>
            <br>
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
