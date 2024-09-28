@extends('layouts.app')

@section('titulo', 'Editar Recurso')

@section('contenido')
@section('estilos')
<link rel="stylesheet" href="{{ asset('css/editar.css') }}">
@endsection
<a href="{{ route(name: 'recursos.index') }}" class="btn btn-primary mb-3">Volver a Recursos</a>
<div class="contenedor-principal">
    <div class="contenedor-secundario">
        <div class="titulo-contenedor">
            <h1>Editar Recurso</h1>
        </div>
        <form action="{{ route('recursos.update', $recurso->id_recurso) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="id_ambiente">ID Ambiente:</label>
                <input type="number" id="id_ambiente" name="id_ambiente" class="form-control" value="{{ $recurso->id_ambiente }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="form-control" rows="4" required>{{ $recurso->descripcion }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="estado">Estado:</label>
                <select id="estado" name="estado" class="form-control" required>
                    <option value="activo" {{ $recurso->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ $recurso->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Recurso</button>
        </form>
    </div>
</div>
@endsection
