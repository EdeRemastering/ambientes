<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AmbiGestion')</title>

    <!-- Fuentes de Google -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- CSS de Bootstrap y archivos personalizados -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">

    <!-- Sección para incluir estilos adicionales en vistas específicas -->
    @yield('styles')

    <!-- Estilos personalizados -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            color: white;
            padding: 0;
            overflow-x: hidden;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
        }

        table {
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            border-radius: 10px;
            color: white !important; 
        }

        .pagination .page-link {
            background-color: #2c5364;
            color: white;
        }

        .pagination .page-item.active .page-link {
           
            background-color: #203a43;
            border: 2px solid #4CAF50;
            color: white;
        }

        .pagination .page-item .page-link:hover {
 
            background-color: #203a43;
            border: 2px solid #4CAF50;
            color:white;
        }

        .table.table-striped {
            border-top: none !important;
            box-shadow: 2px 2px 10px black !important;
        }

        .table.table-striped th, .table.table-striped td {
            border-top: none !important;
        }


        thead {
            border-top: none !important;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            padding-top: 20px;
            border-right: 2px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s;
        }
        .sidebar.minimized {
            width: 80px;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: 600;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            transition: all 0.3s;
        }
        .sidebar a i {
            font-size: 24px;
            margin-right: 10px;
        }
        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        .sidebar .sidebar-text {
            display: inline-block;
            transition: all 0.3s;
        }
        .minimized .sidebar-text {
            display: none;
        }
        .minimized a {
            justify-content: center;
        }
        .content {
            margin-left: 250px;
            padding: 1rem;
            width: calc(100vw - 250px);
            background-color: #f8f9fa;
            height: calc(100vh - 80px);
            transition: all 0.3s;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
        }
        .content.minimized {
            margin-left: 80px;
            width: calc(100vw - 80px);
        }
        .navbar {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            margin-left: 250px;
            height: 80px;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            transition: all 0.3s;
        }
        .navbar.minimized {
            margin-left: 80px;
        }
        #cerrar-sesion {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }
        #cerrar-sesion:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>

<header class="navbar">
    <button id="toggleSidebar" class="btn btn-light">☰</button>
    <div><h2>@yield('title', 'My title')</h2></div>
    <div class="dropdown" style="position: relative;">
        <button class="btn btn-light dropdown-toggle" type="button" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bi bi-person-circle"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="{{ route('settings.index') }}">Ajustes</a>
            <div class="dropdown-divider"></div>
            <form action="{{ route('auth.logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="dropdown-item">Cerrar Sesión</button>
            </form>
        </div>
    </div>
</header>


<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <h2><a href="{{ route('home') }}" class="sidebar-text">AmbiGestion</a></h2>
    <a href="{{ route('home') }}"><i class="bi bi-house"></i> <span class="sidebar-text">Inicio</span></a>
    <a href="{{ route('usuarios.index') }}"><i class="bi bi-people"></i> <span class="sidebar-text">Gestión de usuarios</span></a>
    <a href="{{ route('ambientes.index') }}"><i class="bi bi-building"></i> <span class="sidebar-text">Gestión de ambientes</span></a>
    <a href="{{ route('recursos.index') }}"><i class="bi bi-box"></i> <span class="sidebar-text">Gestión de recursos</span></a>
    <a href="{{ route('novedades.index') }}"><i class="bi bi-bell"></i> <span class="sidebar-text">Gestión de novedades</span></a>
</div>

<!-- Main Content -->
<section class="content" id="content">
    <div class="principal-content">
       @yield('content')
    </div>
</section>

<!-- Scripts comunes -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>

<!-- Script para minimizar el sidebar -->
<script>
    document.getElementById('toggleSidebar').addEventListener('click', function() {
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const navbar = document.querySelector('.navbar');
        
        sidebar.classList.toggle('minimized');
        content.classList.toggle('minimized');
        navbar.classList.toggle('minimized');
    });
</script>

<!-- Sección para incluir scripts adicionales en vistas específicas -->
@yield('scripts')

</body>
</html>
