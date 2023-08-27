@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Administrar Tareas</h1>
    
    <a href="{{ route('tareas.create') }}" class="btn btn-success">Agregar Tarea</a>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Latitud</th>
                <th>Longitud</th>
                <th>Mercancía</th>
                <th>Id.Distribuidor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tareas as $tarea)
                <tr>
                    <td>{{ $tarea->id }}</td>
                    <td>{{ $tarea->fecha }}</td>
                    <td>{{ $tarea->nombre }}</td>
                    <td>{{ $tarea->direccion }}</td>
                    <td>{{ $tarea->latitud }}</td>
                    <td>{{ $tarea->longitud }}</td>
                    <td>{{ $tarea->mercancia }}</td>
                    <td>{{ $tarea->distribuidor_id }}</td>
                    <td>
                        <a href="{{ route('tareas.edit', $tarea) }}" class="btn btn-sm btn-primary">Editar</a>

                        <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
