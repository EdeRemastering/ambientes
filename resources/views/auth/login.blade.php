    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Iniciar Sesión</title>
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
        }

        header h1 {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            width: 320px;
        }

        input, button {
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

            button {
                width: 100%;
                padding: 10px;
                border: none;
                border-radius: 5px;
                background-color: #4CAF50;
                color: white;
                cursor: pointer;
                transition: background-color 0.3s;
            }
            button:hover {
                background-color: #45a049;
            }
 
            p, a {
                color: #fff;
                text-align: center;
                margin-top: 20px;
            }
            a {
                display: block;
                text-decoration: none;
                color: #4CAF50;
            }
            .error-message {
                background-color: rgba(255, 0, 0, 0.2);
                color: #fff;
                padding: 10px;
                border-radius: 5px;
                margin-bottom: 20px;
                text-align: center;
            }
        </style>
    </head>
    <body>


        <div class="login-container">
            
        <header>
        <h1>Iniciar Sesion</h1>
</header>
            @if ($errors->any())
                <div class="error-message">
                    Las credenciales no coinciden.
                </div>
            @endif
            
            <form action="{{ route('auth.authenticate') }}" method="POST">
                @csrf
                <input type="email" name="email" placeholder="Correo electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit">Iniciar Sesión</button>
            </form>

            <p>¿No tienes una cuenta?</p>
            <a href="{{ route('auth.register') }}">Regístrate</a>
        </div>
        <div class="waves"></div>
    </body>
    </html>