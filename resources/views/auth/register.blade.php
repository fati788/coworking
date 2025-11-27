<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Bootstrap Only</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light  bg-gradient d-flex align-items-center" style="height: 100vh;">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">

            <div class="card shadow-lg rounded-4 border-0">
                <div class="card-body p-4">

                    <h3 class="text-center mb-4 fw-semibold">Crear Cuenta</h3>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nombre completo</label>
                            <input type="text" class="form-control rounded-4" value="{{ old('name') }}" name="name" placeholder="Juan Pérez" required>
                            @error('name') <span>{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Correo electrónico</label>
                            <input type="email"  name="email" class="form-control rounded-4" value="{{ old('email') }}" placeholder="tu@correo.com" required>
                            @error('email') <span>{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Contraseña(8 caracteres)</label>
                            <input type="password" name="password" class="form-control rounded-4" placeholder="••••••••" required>
                            @error('password') <span>{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" class="form-control rounded-4" placeholder="••••••••" required>

                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-4 mt-2">
                            Registrarse
                        </button>
                        <p class="text-center mt-4 mb-0">
                            ¿No tienes una cuenta?
                            <a href="" class="fw-bold text-primary text-decoration-none">Regístrate aquí</a>
                        </p>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
