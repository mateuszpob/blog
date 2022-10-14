@extends('layouts.main')

@section('content')
    <div>
        <h1>Redaktor</h1>
        <a href="{{ route('blog.createpostform') }}">Dodaj post</a>
        <br>
        <a href="{{ route('blog.postlist') }}">Pokaż posty</a>
    </div>
@endsection
