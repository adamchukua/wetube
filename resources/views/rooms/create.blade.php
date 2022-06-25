@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Створити кімнату</h1>
        <form action="/room" method="post">
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="row mt-2">
                        <input id="username"
                               type="text"
                               class="form-control
                               @error('username') is-invalid @enderror"
                               name="username"
                               value="{{ old('username') }}"
                               placeholder="Нікнейм"
                               required autocomplete="username" autofocus>

                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row mt-2">
                        <input id="url"
                               type="text"
                               class="form-control
                               @error('url') is-invalid @enderror"
                               name="url"
                               value="{{ old('url') }}"
                               placeholder="Посилання на відео YouTube"
                               required autocomplete="url" autofocus>

                        @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button class="btn btn-primary mt-4">Створити кімнату</button>
                </div>
            </div>
        </form>
    </div>
@endsection
