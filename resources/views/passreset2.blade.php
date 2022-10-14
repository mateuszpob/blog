<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>BLog</title>
    </head>
    <body>
        <main>
            <div>
                <h1>Resetuj haslo</h1>

                <div>
                    <form method="POST" action="">
                        @csrf
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

                        <button type="submit">Resetuj</button>

                    </form>
                </div>
            </div>
        </main>
    </body>
</html>
