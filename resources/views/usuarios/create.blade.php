

@extends('layouts.app')

@section('titulo', 'Usuarios')

@section('contenido')
<a href="{{ route(name: 'usuarios.index') }}" class="btn btn-primary mb-3">Volver a Usuarios</a>
    @section('accion', 'Registrar Nuevo Usuario') 
    @include('layouts.register')  
@endsection

@section('scripts')

@endsection