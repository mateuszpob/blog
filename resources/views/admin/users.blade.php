@extends('layouts.main')

@section('content')
    <div>
        <h1>Urzytkownicy</h1>
        <ul>
        @foreach ($users as $user)
            <li>{{ str_pad($user->email, 32) }}; {{ str_pad($user->name, 32) }}; <strong>{{ str_pad($user->role, 32) }}</strong>

                <a href="{{ route('users.editform', ['id' => $user->id]) }}" >Edytuj</a>
                <form method="POST" action="{{ route('users.delete', ['id' => $user->id]) }}">@csrf<input type="submit" value="Usuń"></form>

            </li>
        @endforeach
        </ul>
    </div>
@endsection
