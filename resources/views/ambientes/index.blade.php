@extends('layouts.app')

@section('titulo', 'Ambientes')

@section('contenido')
<!-- Enlace para crear un nuevo ambiente -->
<a href="{{ route('ambientes.create') }}" class="btn boton-crear btn-success">Crear Ambiente</a>
<a class="btn btn-success">Disponibles: {{$ambientesDisponibles}}</a>
<a class="btn btn-success">Ocupados: {{$ambientesOcupados}}</a>
<a class="btn btn-success">En mantenimiento: {{$ambientesEnMantenimiento}}</a>
<a class="btn btn-success">Fuera de servicio: {{$ambientesFueraServicio}}</a>
<a class="btn btn-success">Total: {{$ambientesTotal}}</a>

<!-- Tabla de ambientes -->
<table id="ambienteTable" class="table table-striped " style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Número</th>
            <th>Alias</th>
            <th>Capacidad</th>
            <th>Descripción</th>
            <th>Tipo</th>
            <th>Estado</th>
            <th>Red de Conocimiento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ambientes as $ambiente)
        <tr>
            <td>{{ $ambiente->id }}</td>
            <td>{{ $ambiente->numero }}</td>
            <td>{{ $ambiente->alias }}</td>
            <td>{{ $ambiente->capacidad }}</td>
            <td>{{ $ambiente->descripcion }}</td>
            <td>{{ $ambiente->tipo_ambiente }}</td>
            <td>{{ $ambiente->estado_ambiente }}</td>
            <td>{{ $ambiente->nombre_red_de_conocimiento }}</td>
            <td>
                <a href="{{ route('ambientes.edit', $ambiente->id) }}" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i></a>
                <form id="formularioEliminar-{{ $ambiente->id }}" action="{{ route('ambientes.destroy', $ambiente->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="mensajeDeEliminacion(event, '{{ $ambiente->id }}', '{{ $ambiente->alias }}', 'ambientes')">
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
        $('#ambienteTable').DataTable({
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