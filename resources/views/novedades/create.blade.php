@extends('layouts.app')

@section('titulo', 'Crear Novedad')

@section('contenido')

<div class="contenedor-principal">

    <div class="contenedor-secundario">
        <form action="{{ route('novedades.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese el nombre de la novedad" required>
            </div>

            <div class="form-group mb-3">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="form-control" rows="4" placeholder="Descripción de la novedad" required></textarea>
            </div>

            <div class="form-group mb-3">
                <label for="estado_novedad">Estado Novedad:</label>
                <select id="estado_novedad" name="estado_novedad" class="form-control" required>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="fecha_solucion">Fecha Solución:</label>
                <input type="date" id="fecha_solucion" name="fecha_solucion" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Crear Novedad</button>
        </form>
    </div>
</div>
@endsection
