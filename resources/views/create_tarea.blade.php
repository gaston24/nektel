@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Tarea</h1>

    <form action="{{ route('tareas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" id="fecha" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="latitud">Latitud:</label>
            <input type="text" name="latitud" id="latitud" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="longitud">Longitud:</label>
            <input type="text" name="longitud" id="longitud" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="mercancia">Mercancia:</label>
            <input type="text" name="mercancia" id="mercancia" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="distribuidor_id">Distribuidor:</label>
            <select name="distribuidor_id" id="distribuidor_id" class="form-control" required>
                <option value="" disabled selected>Seleccione un distribuidor</option>
                @foreach ($distribuidores as $distribuidor)
                    <option value="{{ $distribuidor->id }}">{{ $distribuidor->login }}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
