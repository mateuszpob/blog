<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>BLog</title>
    </head>
    <body>
        <main>
            <div>
                <h1>Zresetuj hasło</h1>

                <div>
                    <form method="POST" action="{{ route('pass.reset') }}">
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

                        <button type="submit">Reset</button>

                        <a href="{{ route('login.form') }}">Zaloguj</a>
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>
