@extends('layouts.app')

@section('titulo', 'Usuarios')

@section('contenido')

@section('estados')
<a href="{{ route('usuarios.create') }}" class="btn btn-success boton-crear">Crear Nuevo Usuario</a>
@endsection

<table id="usuariosTable" class="table table-striped" style="width:100%">
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
                <form id="formularioEliminar-{{$usuario->id}}" action="{{ route('usuarios.delete', $usuario->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" id="delete" onclick="mensajeDeEliminacion(event, '{{ $usuario->id }}', '{{ $usuario->email }}', 'usuarios')">
                        <i class="bi bi-trash3-fill"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

