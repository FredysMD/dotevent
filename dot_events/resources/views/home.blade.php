@extends('layouts.app')

@section('content')
<div class="container">
    @if ($events->count() == 0)
        <h2>No hay eventos disponibles</h2>
    @else
        <div class="row">
            <div class="row">
                <div class="col-11">
                    <h2 class="pb-5">Capacitaciones</h2>
                </div>
                @if (auth()->check() && auth()->user()->role == 0)
                    <div class="col-1">
                        <a href="{{ route('events.create') }}" class="btn btn-success">+Evento</a>
                    </div>
                @endif
            </div>
            @foreach ($events as $event)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-text">{{ $event->description }}</p>
                            <a href="{{ route('events.show', $event->id) }}" class="btn btn-info">Ver detalle</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
