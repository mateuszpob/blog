@extends('layouts.main')

@section('content')
    <div>
        <h1>Admin</h1>
        <a href="{{ route('blog.createpostform') }}">Dodaj post</a>
        <br>
        <a href="{{ route('blog.postlist') }}">Pokaż posty</a>
        <br>
        <br>
        <a href="{{ route('users.create') }}">Dodaj użytkownika</a>
        <br>
        <a href="{{ route('get.users') }}">Pokaż użytkowników</a>
    </div>
@endsection
