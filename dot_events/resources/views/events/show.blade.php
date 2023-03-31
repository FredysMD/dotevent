@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-primary">{{ $event->title }}</h1>
        <p class="text-muted">Fecha: {{ $event->date }}</p>
        <p class="text-muted">Duración: {{ $event->time }}</p>
        <p class="text-muted">Lugar: {{ $event->location }}</p>
        <p class="text-muted">Instructor: {{ $event->instructors }}</p>
        <p class="text-muted">Costo: {{ $event->cost }} COP</p>
        <p class="text-muted">Cupo limitado a: {{ $event->limit }}</p>
        <hr>
        <p>{{ $event->description }}</p>

        <a href="{{ route('home') }}" class="btn btn-secondary">Atrás</a>
        
        @if (auth()->check())
            @if (!$userRegistered)
                <form method="POST" action="{{ route('events.join') }}" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <button type="submit" class="btn btn-primary">Unirme</button>
                </form>
            @else
                <form action="{{ route('events.unjoin', $event) }}" method="POST"  class="d-inline-block">
                    @csrf
                    <button type="submit" class="btn btn-danger">Abandonar este evento</button>
                </form>
            @endif
        @else
            <p>Para unirte a este evento debes <a href="{{ route('login') }}">iniciar sesión</a></p>
        @endif
    </div>
@endsection