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
                <a style="float: right;" href="{{ route('blog.editpost', ['id' => $post->id]) }}">Edytuj</a>
                <span style="float: right;">&nbsp;</span>
                <a style="float: right;" href="{{ route('blog.deletepost', ['id' => $post->id]) }}">Usuń</a>
                <p>{{ $post->body }}</p>
            </div>
            <hr>
        @endforeach
        <hr>
        <a href="?page={{ app('request')->has('page') && app('request')->input('page') > 1 ? (app('request')->input('page')) - 1 : 1 }}">Bliżej</a>
        <a href="?page={{ app('request')->has('page') ? (app('request')->input('page')) + 1 : 2 }}">Dalej</a>
    </div>
@endsection
