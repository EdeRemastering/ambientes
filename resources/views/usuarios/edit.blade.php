

@extends('layouts.app')

@section('estilos')
<link rel="stylesheet" href="{{ asset('css/editar.css') }}">
@endsection
@section('titulo', 'Usuarios')

@section('contenido')
<a href="{{ route(name: 'usuarios.index') }}" class="btn btn-primary mb-3">Volver a Usuarios</a>

<div class="contenedor-principal">
        
        <section class="contenedor-secundario">
        <div class="titulo-contenedor">
                <h1>Editar Usuario</h1>
        </div>
        <form action="{{ route('usuarios.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div>
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>
            <div>      
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Ingrese nueva contraseña (deje vacío si no desea cambiarla)">
                
                <label for="password_confirmation">Confirmar Contraseña:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirme la nueva contraseña">
            </div>
           
          
        </form>
          
        <button id="actualizar" type="submit" class="btn-primary">Actualizar Usuario</button>
        </section>
        </div>
        
        
        
@endsection

@section('scripts')

@endsection
    
    

