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

</div>

<div class="container">
    <h1>Editar Distribuidor</h1>

    <form action="{{ route('distribuidores.update', $distribuidor) }}" method="POST">
        @csrf
        @method('PUT') {{-- Usar 'PATCH' para la actualización --}}
        
        <div class="form-group">
            <label for="login">Nombre:</label>
            <input type="text" name="login" id="login" class="form-control" value="{{ $distribuidor->login }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $distribuidor->email }}" required>
        </div>
        <!-- Agregar más campos aquí según tus necesidades -->

        <hr> <!-- Agregar una línea divisora -->

        <h2>Cambiar Contraseña</h2>
        <div class="form-group">
            <label for="contraseña_actual">Contraseña actual:</label>
            <input type="password" name="contraseña_actual" id="contraseña_actual" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nueva_contraseña">Nueva Contraseña:</label>
            <input type="password" name="nueva_contraseña" id="nueva_contraseña" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nueva_contraseña_confirmation">Confirmar Nueva Contraseña:</label>
            <input type="password" name="nueva_contraseña_confirmation" id="nueva_contraseña_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <a href="{{ route('admin.distribuidores.index') }}" class="btn btn-danger">Cancelar</a>

    </form>
</div>
@endsection
