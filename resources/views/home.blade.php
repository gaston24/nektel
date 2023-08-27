@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Home') }}</div>

                    <div class="card-body">
                        <p>Bienvenido a la página de inicio.</p>
                        <a href="{{ route('admin.distribuidores.index') }}" class="btn btn-primary">Administrar Distribuidores</a>
                        <a href="{{ route('admin.tareas.index') }}" class="btn btn-primary">Administrar Tareas</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
