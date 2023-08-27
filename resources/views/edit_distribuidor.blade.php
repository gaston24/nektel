@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Distribuidor</h1>

    <form action="{{ route('distribuidores.update', $distribuidor) }}" method="POST">
        @csrf
        @method('PATCH') {{-- Usar 'PATCH' para la actualización --}}
        
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
            <label for="current_password">Contraseña actual:</label>
            <input type="password" name="current_password" id="current_password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="new_password">Nueva Contraseña:</label>
            <input type="password" name="new_password" id="new_password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="new_password_confirmation">Confirmar Nueva Contraseña:</label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection
