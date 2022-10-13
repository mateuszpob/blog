@extends('layouts.main')

@section('content')
    <div>
        <h1>Urzytkownicy</h1>
        <ul>
        @foreach ($users as $user)
            <li>{{ $user->email }}

                <a href="{{ route('users.editform', ['id' => $user->id]) }}" >Edytuj</a>
                <form method="POST" action="{{ route('users.delete', ['id' => $user->id]) }}">@csrf<input type="submit" value="Usuń"></form>

            </li>
        @endforeach
        </ul>
    </div>
@endsection
