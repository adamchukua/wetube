@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Кімнати</h1>
        @forelse($rooms as $room)
            <div></div>
        @empty
            Тут поки що немає кімнат, натомість створіть свою натиснуваши "Створити кімнату"
        @endforelse
    </div>
@endsection
