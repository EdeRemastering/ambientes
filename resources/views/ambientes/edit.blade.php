@extends('layouts.app')

@section('titulo', 'Editar Ambiente')

@section('contenido')

<div class="contenedor-principal">
    <section class="contenedor-secundario">
  
        <form action="{{ route('ambientes.update', $ambiente->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="numero">Número:</label>
            <input type="text" name="numero" id="numero" value="{{ old('numero', $ambiente->numero) }}" required>

            <label for="alias">Alias:</label>
            <input type="text" name="alias" id="alias" value="{{ old('alias', $ambiente->alias) }}" required>

            <label for="capacidad">Capacidad:</label>
            <input type="number" name="capacidad" id="capacidad" value="{{ old('capacidad', $ambiente->capacidad) }}" required>

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" required>{{ old('descripcion', $ambiente->descripcion) }}</textarea>

            <label for="tipo">Tipo:</label>
            <select name="tipo" id="tipo">
                <option value="1" {{ old('tipo', $ambiente->tipo) == '1' ? 'selected' : '' }}>Tecnología</option>
                <option value="2" {{ old('tipo', $ambiente->tipo) == '2' ? 'selected' : '' }}>Carnicería</option>
            </select>

            <label for="estado">Estado:</label>
            <select name="estado" id="estado">
                <option value="1" {{ old('estado', $ambiente->estado) == '1' ? 'selected' : '' }}>Activo</option>
                <option value="2" {{ old('estado', $ambiente->estado) == '2' ? 'selected' : '' }}>Inactivo</option>
            </select>

            <label for="red_de_conocimiento">Red de Conocimiento:</label>
            <select name="red_de_conocimiento" id="red_de_conocimiento">
                <option value="1" {{ old('red_de_conocimiento', $ambiente->red_de_conocimiento) == '1' ? 'selected' : '' }}>Red de Tik</option>
                <option value="2" {{ old('red_de_conocimiento', $ambiente->red_de_conocimiento) == '2' ? 'selected' : '' }}>Red de Tok</option>
            </select>

            <button type="submit" class="btn btn-primary">Actualizar Ambiente</button>
        </form>
    </section>
</div>
@endsection
