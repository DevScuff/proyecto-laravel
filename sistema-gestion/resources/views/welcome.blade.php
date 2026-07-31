<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Integral ISP</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Barra de Navegación superior -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistema Integral ISP</a>
            
            <div>
                @auth
                    <!-- Si ya inició sesión, muestra el botón de Log Out -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">Log Out</button>
                    </form>
                @else
                    <!-- Si NO ha iniciado sesión, muestra Login y Register -->
                    <div class="d-flex gap-3">
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Register</a>
                        @endif
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <!-- Tarjeta de Bienvenida -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h2 class="card-title mb-3">Bienvenido al Sistema ISP</h2>
                        <p class="text-muted">Módulo de control para Clientes, Facturas y Tickets de Soporte.</p>
                    </div>
                </div>

                <!-- Formulario de Registro de Clientes -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Registrar Nuevo Cliente</h4>
                        
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('clients.store') }}" method="POST">
                            @csrf 
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre del Cliente</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Teléfono</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-dark">Guardar Cliente</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>