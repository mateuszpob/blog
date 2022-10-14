@extends('layouts.main')

@section('content')
    <div>
        <h1>Dodaj post</h1>

        <div>
            <form method="POST" action="">
                @csrf
                <div>
                    <label>Tytuł</label>
                    <input value="{{ $post->title ?? old('title') }}"
                        type="text"
                        name="title"
                        placeholder="Tytuł" required>

                    @if ($errors->has('title'))
                        <span >{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div >
                    <label>Post</label>
                    <textarea
                    style="width:800px;height:400px;"
                        name="body"
                        placeholder="Treść posta" required>{{ $post->body ?? old('body') }}</textarea>
                    @if ($errors->has('body'))
                        <span >{{ $errors->first('body') }}</span>
                    @endif
                </div>


                <button type="submit">Zapisz</button>
            </form>
        </div>

    </div>
@endsection
