@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <h1>Editar Tarea</h1>

    <form action="{{ route('tareas.update', $tarea) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $tarea->fecha }}" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $tarea->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion" class="form-control" value="{{ $tarea->direccion }}" required>
        </div>
        <div class="form-group">
            <label for="latitud">Latitud:</label>
            <input type="text" name="latitud" id="latitud" class="form-control" required
                value="{{ $tarea->latitud }}" inputmode="numeric" pattern="[0-9.°']+" title="Ingrese solo números">
         
        </div>
        <div class="form-group">
            <label for="longitud">Longitud:</label>
            <input type="text" name="longitud" id="longitud" class="form-control" required
                value="{{ $tarea->longitud }}" inputmode="numeric" pattern="[0-9.°']+" title="Ingrese solo números">

        </div>
        <div class="form-group">
            <label for="mercancia">Mercancia:</label>
            <input type="text" name="mercancia" id="mercancia" class="form-control" value="{{ $tarea->mercancia }}" required>
        </div>
        <div class="form-group">
            <label for="distribuidor_id">Distribuidor:</label>
            <select name="distribuidor_id" id="distribuidor_id" class="form-control" required>
                @foreach ($distribuidores as $distribuidor)
                    <option value="{{ $distribuidor->id }}" {{ $distribuidor->id == $tarea->distribuidor_id ? 'selected' : '' }}>{{ $distribuidor->login }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <a href="{{ route('admin.tareas.index') }}" class="btn btn-danger">Cancelar</a>

    </form>
</div>
@endsection
