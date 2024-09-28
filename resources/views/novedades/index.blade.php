@extends('layouts.app')

@section('titulo', 'Novedades')

@section('contenido')
<!-- Enlace para crear una nueva novedad -->
<a href="{{ route('novedades.create') }}" class="btn boton-crear btn-success mb-3">Crear Novedad</a>

<!-- Tabla de novedades -->
<table id="novedadTable" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Fecha de Registro</th>
            <th>Estado de Novedad</th>
            <th>Fecha de Solución</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($novedades as $novedad)
        <tr>
            <td>{{ $novedad->id }}</td>
            <td>{{ $novedad->nombre }}</td>
            <td>{{ $novedad->descripcion }}</td>
            <td>{{ $novedad->fecha_registro }}</td>
            <td>{{ $novedad->estado_novedad }}</td>
            <td>{{ $novedad->fecha_solucion }}</td>
            <td>
                <a href="{{ route('novedades.edit', $novedad->id) }}" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i></a>
                <form action="{{ route('novedades.destroy', $novedad->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta novedad?')"><i class="bi bi-trash3-fill"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#novedadTable').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            lengthChange: false,
            pageLength: 5,
            language: {
                url: '//cdn.datatables.net/plug-ins/2.1.7/i18n/es-MX.json'
            }
        });
    });
</script>
@endsection