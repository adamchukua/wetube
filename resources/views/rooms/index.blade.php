@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-3">Кімнати</h1>
        @forelse($rooms as $room)
            <div class="row">
                <div class="col-12 d-flex mt-2 mb-2" style="border-bottom: 1px solid #cecece">
                    <div class="me-5">
                        <p>{{ $room->id }}</p>
                    </div>
                    <div>
                        <a href="/room/{{ $room->id }}">Приєднатись</a>
                    </div>
                </div>
            </div>
        @empty
            Тут поки що немає кімнат, натомість створіть свою натиснуваши "Створити кімнату"
        @endforelse
    </div>
@endsection
