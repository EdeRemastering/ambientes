<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Estilos generales para el formulario */
        .contenedor-principal {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .main-content {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: fit-content;
            margin: 0;
            position: relative;
        }

        .titulo-contenedor h1 {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .main-content {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            width: 320px;
        }

        input, #registrar {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: none;
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        #registrar {
            background-color: #4CAF50;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
            font-weight: 600;
        }

        #registrar:hover {
            background-color: #45a049;
        }

        .error-message, .success-message {
            background-color: rgba(255, 0, 0, 0.2);
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }

        .success-message {
            background-color: rgba(0, 255, 0, 0.2);
        }
    </style>
   
     @yield('styles')
</head>
<body>

 
    <div class="contenedor-principal">
    <section class="main-content">
<div class="titulo-contenedor">
        <h1>Crear Usuario</h1>
</div>
        @if ($errors->any())
            <div class="error-message">
                @if ($errors->has('password'))
                    Las contraseñas no coinciden.
                @else
                    Por favor, verifica los datos ingresados.
                @endif
            </div>
        @endif

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(function() {
                    window.location.href = "{{ route('auth.authenticate') }}";
                }, 3000);
            </script>
        @endif

        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nombre" required>
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required>
            <button id="registrar" type="submit">@yield('accion', 'nombreAccion')</button>
        </form>

        @yield('opcionInicioSesion')
    </section>

    </div>
   
</body>
</html>
