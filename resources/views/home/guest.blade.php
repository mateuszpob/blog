@extends('layouts.main')

@section('content')
    <div>
        <hr>
        <a href="?page={{ app('request')->has('page') && app('request')->input('page') > 1 ? (app('request')->input('page')) - 1 : 1 }}">Bliżej</a>
        <a href="?page={{ app('request')->has('page') ? (app('request')->input('page')) + 1 : 2 }}">Dalej</a>
        <hr>
        @foreach ($posts as $post)
            <div>
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->body }}</p>
            </div>
        @endforeach
        <hr>
        <a href="?page={{ app('request')->has('page') && app('request')->input('page') > 1 ? (app('request')->input('page')) - 1 : 1 }}">Bliżej</a>
        <a href="?page={{ app('request')->has('page') ? (app('request')->input('page')) + 1 : 2 }}">Dalej</a>
    </div>
@endsection
