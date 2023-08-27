@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Distribuidor</h1>

    <form action="{{ route('distribuidores.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="login">Nombre:</label>
            <input type="text" name="login" id="login" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
    

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
