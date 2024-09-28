<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AmbiGestión - Innovación en Asignación de Ambientes</title>
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
            height: fit-content;
            color: #fff;
            overflow-y: visible;
        }

        header {
            text-align: center;
        }

        header h1 {
            font-size: 2.5rem;
            color: #fff;
            margin-bottom: 10px;
            font-weight: 700;
        }

        header p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 30px;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            width: 80%;
            max-width: 1200px;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h2 {
            font-size: 1.5rem;
            color: #4CAF50;
            margin-bottom: 15px;
        }

        .card p {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .action-buttons {
            margin-top: 40px;
            text-align: center;
        }

        .action-buttons a {
            text-decoration: none;
            font-size: 1.1rem;
            padding: 15px 30px;
            margin: 10px;
            border-radius: 5px;
            display: inline-block;
            transition: background-color 0.3s;
            color: white;
            cursor: pointer;
        }

        .register {
            background-color: #4CAF50;
        }

        .register:hover {
            background-color: #45a049;
        }

        .login {
            background-color: #203a43;
            border: 2px solid #4CAF50;
        }

        .login:hover {
            background-color: #2c5364;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .card {
                margin: 0; /* Eliminar márgenes para pantallas pequeñas */
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>AmbiGestión</h1>
        <p>La solución innovadora para la asignación eficiente de ambientes a instructores.</p>
    </header>

    <div class="card-container">
        <div class="card">
            <h2>Asignación Inteligente</h2>
            <p>Con AmbiGestión, optimiza la asignación de ambientes según la disponibilidad, tipo de clase y perfil del instructor. Ahorra tiempo y evita conflictos en los horarios.</p>
        </div>

        <div class="card">
            <h2>Gestión en Tiempo Real</h2>
            <p>Visualiza la disponibilidad de los espacios en tiempo real. Cambia, organiza y ajusta las asignaciones con solo unos clics a través de un calendario dinámico e interactivo.</p>
        </div>

        <div class="card">
            <h2>Automatización Eficiente</h2>
            <p>Automatiza procesos repetitivos y recibe notificaciones instantáneas sobre cambios en la programación de ambientes. Mantén el control sin esfuerzo adicional.</p>
        </div>

        <div class="card">
            <h2>Optimización de Recursos</h2>
            <p>Asegura que cada ambiente sea utilizado de manera eficiente, basándote en la capacidad de los espacios, el tipo de clase y los requisitos técnicos de los cursos.</p>
        </div>

        <div class="card">
            <h2>Reportes y Análisis</h2>
            <p>Obtén reportes detallados del uso de los ambientes para la toma de decisiones estratégicas. Con AmbiGestión, mejora la administración de tus recursos educativos.</p>
        </div>

        <div class="card">
            <h2>Escalable y Personalizable</h2>
            <p>AmbiGestión es útil y adaptable para todos los SENAS e inlcuso otro tipo de instituciones si así se requiere.</p>
        </div>
    </div>

    <div class="action-buttons">
        <a href="{{ route('auth.register') }}" class="register">Regístrate</a>
        <a href="{{ route('login') }}" class="login">Iniciar Sesión</a>
    </div>

</body>
</html>
