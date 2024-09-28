@extends('layouts.app')

@section('estilos')
<link rel="stylesheet" href="{{ asset('css/editar.css') }}">
@endsection
@section('titulo', 'Crear Ambiente')

@section('contenido')
<a href="{{ route('ambientes.index') }}" class="btn btn-primary mb-3">Volver a Ambientes</a>

    <div class="container">
        <h1>Crear Nuevo Ambiente</h1>

        <!-- Muestra errores de validación si existen -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario de creación de ambientes -->
        <form action="{{ route('ambientes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="numero">Número:</label>
                <input type="text" name="numero" id="numero" class="form-control" value="{{ old('numero') }}">
            </div>

            <div class="form-group">
                <label for="alias">Alias:</label>
                <input type="text" name="alias" id="alias" class="form-control" value="{{ old('alias') }}">
            </div>

            <div class="form-group">
                <label for="capacidad">Capacidad:</label>
                <input type="number" name="capacidad" id="capacidad" class="form-control" value="{{ old('capacidad') }}">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
            </div>

            <div class="form-group">
                <label for="tipo">Tipo:</label>
                 <select name="tipo" id="tipo">
                    <option value="1">Tecnología</option>
                    <option value="2">Carnicería</option>
                 </select>
              
            </div>

            <div class="form-group">
                <label for="estado">Estado:</label>
                <select name="estado" id="estado" class="form-control">
                    <option value="1" {{ old('estado') == '1' ? 'selected' : 'Activo' }}>Activo</option>
                    <option value="2" {{ old('estado') == '2' ? 'selected' : 'Inactivo' }}>Inactivo</option>
                </select>
            </div>

            <div class="form-group">
        <label for="red_de_conocimiento">Red de Conocimiento:</label>
        
        <select name="red_de_conocimiento" id="red_de_conocimiento">
            <option value="1">Red de Tik</option>
            <option value="2">Red de Tok</option>
        </select>
    </div>
            <button type="submit" class="btn btn-primary">Crear Ambiente</button>
        </form>
    </div>
@endsection
