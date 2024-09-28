@extends('layouts.register')

@section('estilos')
    <style>
         body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
            position: relative;
            color: white;
        }

        #link-inicio-sesion {
            color:  #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
@endsection
@section('accion', 'Registrarse')
@section('opcionInicioSesion')
    <p>¿Ya tienes una cuenta?</p>
    <a id="link-inicio-sesion" href="{{ route('auth.authenticate') }}">Inicia sesión</a>
@endsection
