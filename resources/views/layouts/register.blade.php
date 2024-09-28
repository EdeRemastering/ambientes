<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    @yield('estilos')
</head>
<body>
    <div class="contenedor-principal">
        <section class="contenedor-secundario">
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