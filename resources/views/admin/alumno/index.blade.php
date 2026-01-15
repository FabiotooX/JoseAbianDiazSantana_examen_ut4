@extends('adminlte::page')

@section('title', 'Alumnos')

@section('content_header')
<h1>Listado de Alumnos</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Calificaciones registradas</h3>
    </div>
    <div class="card-body">
        <!-- Ejercicio: Botón para crear -->
        <a href="{{ route('admin.alumno.create') }}" class="btn btn-primary mb-3">Añadir calificacion</a>

        <!-- Ejercicio: Query y mostrar datos almacenados -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Modulo</th>
                    <th>Calificacion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumno as $alumnos)
                    <tr>
                        <td>{{ $alumnos->nombre }}</td>
                        <td>{{ $alumnos->modulo }}</td>
                        <td>{{ $alumnos->calificacion }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
