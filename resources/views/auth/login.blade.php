<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Nuevo Diseño</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">

<div class="col-11 col-md-4">

    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body p-5">

            <h2 class="text-center mb-4 fw-bold text-primary">Bienvenido</h2>
            <p class="text-center text-muted mb-4">Ingresa a tu cuenta</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf  
                <div class="mb-3">
                    <label class="form-label fw-semibold">Correo electrónico</label>
                    <input type="email" name="email" class="form-control rounded-3" placeholder="tu@correo.com" required>
                    @error('email') <span>{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Contraseña</label>
                    <input type="password" name="password" class="form-control rounded-3" placeholder="******" required>
                    @error('password') <span>{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100 rounded-3 btn-lg">
                    Iniciar Sesión
                </button>

            </form>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
