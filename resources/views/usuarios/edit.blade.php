

@extends('layouts.app')

@section('styles')

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
        /* Estilos generales para el formulario */
        .contenedor-principal {
            font-family: 'Poppins', sans-serif;

            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            width: 100%;
        }

        .titulo-contenedor h1 {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
        }

        .main-content {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            width: fit-content; /* Asegura un ancho constante */
        }

        label {
            color: #fff;
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
        }

        input, select, #actualizar.cta-button {
            width: 100%; /* Asegura que todos los elementos tengan el mismo ancho */
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: none;
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif; /* Aplica la fuente "Poppins" */
            font-size: 14px; /* Ajuste de tamaño de letra */
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        #actualizar.cta-button {
            background-color: #4CAF50;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px; /* Tamaño de fuente mayor para el botón */
            font-weight: 600; /* Peso para el botón */
            width: fit-content;
            margin: auto;
        }

        #actualizar.cta-button:hover {
            background-color: #45a049;
        }

        /* Estilos personalizados para el select */
        select {
            appearance: none; /* Remueve la flecha predeterminada */
            background-image: url('data:image/svg+xml;base64,PHN2ZyBmaWxsPSJ3aGl0ZSIgaGVpZ2h0PSIxMCIgdmlld0JveD0iMCAwIDI0IDEwIiB3aWR0aD0iMjQiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTEgMmwxMSAxMUwyMyAybC0yLTEtMTEgMTEtMTEtMTF6Ii8+PC9zdmc+');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 12px;
            font-family: 'Poppins', sans-serif; /* Aplica la fuente "Poppins" */
            font-size: 14px; /* Tamaño de fuente para el select */
        }

        select:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(0, 255, 0, 0.5);
        }

        select option {
            background-color: rgba(255, 255, 255, 0.1);
            color: #000;
        }

        select::-ms-expand {
            display: none;
        }

        form {
            display: flex;
            gap: 50px;
        }

    </style>
@endsection
@section('title', 'Usuarios')

@section('content')
     

<div class="contenedor-principal">
        
        <section class="main-content">
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
          
        <button id="actualizar" type="submit" class="cta-button">Actualizar Usuario</button>
        </section>
        </div>
        
        
        
@endsection

@section('scripts')

@endsection
    
    

