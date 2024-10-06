@extends('layouts.app')

@section('titulo', 'Novedades')

@section('contenido')
@section('estados')
    <!-- Enlace para crear una nueva novedad -->
@foreach ($estados as $estado)
    @php
        // Busca en la colección el primer registro donde el estado coincida con el ID del estado actual
        $novedadesEnEstado = $novedadesPorEstado->firstWhere('estado', $estado->id);
        
        // Si encontró novedades en ese estado, usa el valor de total; si no, asigna 0
        $cantidad = $novedadesEnEstado ? $novedadesEnEstado->total : 0;
    @endphp
    <a class="btn btn-success">
        {{ ucfirst($estado->nombre) }}: {{ $cantidad }}
    </a>
@endforeach
<a class="btn btn-success">Total: {{ $novedadesTotal }}</a>

<a href="{{ route('novedades.create') }}" class="btn boton-crear btn-success">Crear Novedad</a>
@endsection


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
            <td>{{ $novedad->nombre_estado_novedad }}</td>
            <td>{{ $novedad->fecha_solucion }}</td>
            <td>
            <a href="{{ route('novedades.edit', $novedad->id) }}" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i></a>
                <form id="formularioEliminar-{{ $novedad->id }}" action="{{ route('novedades.destroy', $novedad->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger btn-sm" onclick="mensajeDeEliminacion(event, '{{ $novedad->id }}', '{{ $novedad->nombre }}', 'novedades')">
                        <i class="bi bi-trash3-fill"></i>
                    </button>
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

    // Personaliza el contenedor de búsqueda
    $('#ambienteTable_filter').addClass('custom-search');
</script>
@endsection