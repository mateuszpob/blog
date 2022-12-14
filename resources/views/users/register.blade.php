@extends('layouts.main')

@section('content')
    <div>
        <h1>Register</h1>

        <div>
            <form method="POST" action="">
                @csrf
                <div>
                    <label for="name">Name</label>
                    <input value="{{ old('name') }}"
                        type="text"
                        name="name"
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span >{{ $errors->first('name') }}</span>
                    @endif
                </div>
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
                        type="text"
                        name="password"
                        placeholder="Password" required>
                    @if ($errors->has('password'))
                        <span >{{ $errors->first('username') }}</span>
                    @endif
                </div>

                <button type="submit">Save user</button>
            </form>
        </div>

    </div>
@endsection
