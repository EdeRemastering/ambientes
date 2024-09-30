@extends('layouts.app')

@section('titulo', 'Crear Recurso')

@section('contenido')


<div class="contenedor-principal">
    <div class="contenedor-secundario">
        <form action="{{ route('recursos.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="id_ambiente">ID Ambiente:</label>
                <input type="number" id="id_ambiente" name="id_ambiente" class="form-control" placeholder="Ingrese el ID del ambiente" required>
            </div>

            <div class="form-group mb-3">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="form-control" rows="4" placeholder="Descripción del recurso" required></textarea>
            </div>

            <div class="form-group mb-3">
                <label for="estado">Estado:</label>
                <select id="estado" name="estado" class="form-control" required>
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Crear Recurso</button>
        </form>
    </div>
</div>
@endsection
