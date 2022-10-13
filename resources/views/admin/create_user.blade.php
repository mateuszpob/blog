@extends('layouts.main')

@section('content')
    <div>
        <h1>Dodaj użytkownika</h1>

        <div>
            <form method="POST" action="">
                @csrf
                <div>
                    <label for="name">Name</label>
                    <input value="{{ $user->name ?? old('name') }}"
                        type="text"
                        name="name"
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span >{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div >
                    <label for="email">Email</label>
                    <input value="{{ $user->email ?? old('email') }}"
                        type="email"
                        name="email"
                        placeholder="Email address" required>
                    @if ($errors->has('email'))
                        <span >{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div >
                    <label for="password">Password</label>
                    <input value="{{ old('password') }}"
                        type="password"
                        name="password"
                        placeholder="Password" @if(empty($user))required @endif>
                    @if ($errors->has('password'))
                        <span >{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div >
                    <label for="password">Rola</label>
                    <select name="role">

                        @foreach($roles as $role)
                        <option value="{{ $role }}" @if(isset($user) && $role === $user->role)) selected @endif>{{ $role }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('role'))
                        <span >{{ $errors->first('role') }}</span>
                    @endif
                </div>

                <button type="submit">Save user</button>
            </form>
        </div>

    </div>
@endsection
