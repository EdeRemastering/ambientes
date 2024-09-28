<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'AmbiGestion')</title>

    <!-- Fuentes de Google -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- CSS de Bootstrap y archivos personalizados -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Íconos de Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- CSS de DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Sección para incluir estilos adicionales en vistas específicas -->
    @yield('estilos')
</head>
<body>

<header class="barra-navegacion">
    <button id="alternarBarraLateral" class="btn btn-light">☰</button>
    <div><h2>@yield('titulo', 'Mi título')</h2></div>
    <div class="dropdown" style="position: relative;">
        <button class="btn btn-light dropdown-toggle" type="button" id="menuPerfil" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bi bi-person-circle"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="menuPerfil">
            <a class="dropdown-item" href="{{ route('settings.index') }}">Ajustes</a>
            <div class="dropdown-divider"></div>
            <form action="{{ route('auth.logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="dropdown-item">Cerrar Sesión</button>
            </form>
        </div>
    </div>
</header>

<!-- Barra lateral -->
<div class="barra-lateral" id="barraLateral">
    <h2><a href="{{ route('home') }}" class="texto-barra-lateral">AmbiGestion</a></h2>
    <a href="{{ route('home') }}"><i class="bi bi-house"></i> <span class="texto-barra-lateral">Inicio</span></a>
    <a href="{{ route('usuarios.index') }}"><i class="bi bi-people"></i> <span class="texto-barra-lateral">Gestión de usuarios</span></a>
    <a href="{{ route('ambientes.index') }}"><i class="bi bi-building"></i> <span class="texto-barra-lateral">Gestión de ambientes</span></a>
    <a href="{{ route('recursos.index') }}"><i class="bi bi-box"></i> <span class="texto-barra-lateral">Gestión de recursos</span></a>
    <a href="{{ route('novedades.index') }}"><i class="bi bi-bell"></i> <span class="texto-barra-lateral">Gestión de novedades</span></a>
</div>

<!-- Contenido principal -->
<section class="contenido" id="contenido">
    <div class="contenido-principal">
       @yield('contenido')
    </div>
</section>

<!-- Scripts comunes -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- JS de DataTables -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>

<!-- Script para minimizar la barra lateral -->
<script>
    document.getElementById('alternarBarraLateral').addEventListener('click', function() {
        const barraLateral = document.getElementById('barraLateral');
        const contenido = document.getElementById('contenido');
        const barraNavegacion = document.querySelector('.barra-navegacion');
        
        barraLateral.classList.toggle('minimizada');
        contenido.classList.toggle('minimizado');
        barraNavegacion.classList.toggle('minimizada');
    });
</script>

<!-- Sección para incluir scripts adicionales en vistas específicas -->
@yield('scripts')

</body>
</html>