@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <video-component url="{{ $room->url }}"></video-component>
            </div>
            <!--
             <div class="col-4">
                <div class="chat">

                </div>
            </div>-->
        </div>
    </div>
@endsection
