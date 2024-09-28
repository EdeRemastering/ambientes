<form action="{{ route('ambientes.update', $ambiente->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="numero">Número:</label>
        <input type="text" name="numero" id="numero" class="form-control" value="{{ old('numero', $ambiente->numero) }}" required>
        @if ($errors->has('numero'))
            <span class="text-danger">{{ $errors->first('numero') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="alias">Alias:</label>
        <input type="text" name="alias" id="alias" class="form-control" value="{{ old('alias', $ambiente->alias) }}" required>
        @if ($errors->has('alias'))
            <span class="text-danger">{{ $errors->first('alias') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="capacidad">Capacidad:</label>
        <input type="number" name="capacidad" id="capacidad" class="form-control" value="{{ old('capacidad', $ambiente->capacidad) }}" required>
        @if ($errors->has('capacidad'))
            <span class="text-danger">{{ $errors->first('capacidad') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" class="form-control" required>{{ old('descripcion', $ambiente->descripcion) }}</textarea>
        @if ($errors->has('descripcion'))
            <span class="text-danger">{{ $errors->first('descripcion') }}</span>
        @endif
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
            <option value="1" {{ old('estado', $ambiente->estado) == '1' ? 'selected' : '' }}>Activo</option>
            <option value="2" {{ old('estado', $ambiente->estado) == '2' ? 'selected' : '' }}>Inactivo</option>
        </select>
        @if ($errors->has('estado'))
            <span class="text-danger">{{ $errors->first('estado') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="red_de_conocimiento">Red de Conocimiento:</label>
        
        <select name="red" id="red">
            <option value="1">Red de Tik</option>
            <option value="2">Red de Tok</option>
        </select><select name="estado" id="estado" class="form-control">
            <option value="1" {{ old('red_de_conocimiento', $ambiente->red_de_conocimiento) == '1' ? 'selected' : '' }}>Red de tik</option>
            <option value="2" {{ old('red_de_conocimiento', $ambiente->red_de_conocimiento) == '2' ? 'selected' : '' }}>Red de tok</option>
        </select>
        @if ($errors->has('red_de_conocimiento'))
            <span class="text-danger">{{ $errors->first('red_de_conocimiento') }}</span>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Actualizar Ambiente</button>
</form>
