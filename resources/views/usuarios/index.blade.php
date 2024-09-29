@extends('layouts.app')

@section('titulo', 'Usuarios')

@section('contenido')
<a href="{{ route('usuarios.create') }}" class="btn boton-crear btn-success mb-3">Crear Nuevo Usuario</a>

<table id="userTable" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo Electrónico</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->id }}</td>
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->email }}</td>
            <td>
                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i></a>
                <form action="{{ route('usuarios.delete', $usuario->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?');"><i class="bi bi-trash3-fill"></i></button>
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
        $('#userTable').DataTable({
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