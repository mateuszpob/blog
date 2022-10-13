@extends('layouts.main')

@section('content')
    <div>
        <h1>Login</h1>

        <div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div >
                    <label for="email">Email</label>
                    <input value="{{ old('email') }}"
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
                        placeholder="Password" required>
                    @if ($errors->has('password'))
                        <span >{{ $errors->first('username') }}</span>
                    @endif
                </div>

                <button type="submit">Login</button>
            </form>
        </div>

    </div>
@endsection
