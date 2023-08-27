@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <h1>Administración de Distribuidores</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($distribuidores as $distribuidor)
            <tr>
                <td>{{ $distribuidor->id }}</td>
                <td>{{ $distribuidor->login }}</td>
                <td>{{ $distribuidor->email }}</td>
                <td>
                    <a href="{{ route('distribuidores.edit', $distribuidor) }}" class="btn btn-sm btn-primary">Editar</a>

                    <form action="{{ route ('distribuidores.destroy', $distribuidor) }}" method="DELETE" style="display: inline-block;">
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        @csrf
                        @method('DELETE')
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('distribuidores.create') }}" class="btn btn-success">Agregar Distribuidor</a>
</div>
@endsection
