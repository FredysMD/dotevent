@extends('layouts.app')

@section('content')
    <div class="container pb-5">
        <h1> Capacitaciones </h1>

        <form action="{{ route('events.store') }}" method="POST" onsubmit="return validateForm()">
            @csrf
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea class="form-control" name="description" id="description" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="date">Fecha y hora:</label>
                <input type="datetime-local" class="form-control" name="date" id="date" required>
            </div>
            <div class="form-group">
                <label for="time">Duración (minutos): </label>
                <input type="number" class="form-control" min="0" name="time" id="time" required>
            </div>
            <div class="form-group">
                <label for="location">Lugar:</label>
                <input type="text" class="form-control" name="location" id="location" required>
            </div>
            <div class="form-group">
                <label for="instructors">Instructores:</label>
                <input type="text" class="form-control" name="instructors" id="instructors" required>
            </div>
            <div class="form-group">
                <label for="cost">Costo:</label>
                <input type="number" class="form-control" name="cost" id="cost" required>
            </div>
            <div class="form-group">
                <label for="limit">Cupo límite:</label>
                <input type="number" class="form-control" name="limit" id="limit" required>
            </div>
            <div class="form-group pt-2">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>  
        </form>
    </div>
    <script>
        function validateForm() {
            var inputDate = document.getElementById("date").value;
            var date = new Date(inputDate);
            var dayOfWeek = date.getDay();
            var hours = date.getHours();

            if (dayOfWeek >= 1 && dayOfWeek <= 5 && hours >= 10 && hours <= 22) {
                return true;
            } else {
                alert("La fecha y hora seleccionada debe estar entre las 10 AM y 10 PM, de lunes a viernes.");
                return false;
            }
        }
    </script>
@endsection





