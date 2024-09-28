@extends('layouts.app')

@section('titulo', 'Editar Novedad')

@section('contenido')
@section('estilos')
<link rel="stylesheet" href="{{ asset('css/editar.css') }}">
@endsection
<a href="{{ route('novedades.index') }}" class="btn btn-primary mb-3">Volver a Novedades</a>
<div class="contenedor-principal">
    <div class="contenedor-secundario">
        <div class="titulo-contenedor">
            <h1>Editar Novedad</h1>
        </div>
        <form action="{{ route('novedades.update', $novedad->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $novedad->nombre }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="form-control" rows="4" required>{{ $novedad->descripcion }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="estado_novedad">Estado Novedad:</label>
                <select id="estado_novedad" name="estado_novedad" class="form-control" required>
                    <option value="activo" {{ $novedad->estado_novedad == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ $novedad->estado_novedad == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="fecha_solucion">Fecha Solución:</label>
                <input type="date" id="fecha_solucion" name="fecha_solucion" class="form-control" value="{{ $novedad->fecha_solucion }}">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Novedad</button>
        </form>
    </div>
</div>
@endsection
