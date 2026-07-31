<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Gestión - Sistema ISP</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Sistema Integral ISP</a>
            <span class="navbar-text text-white">
                Panel Administrativo
            </span>
        </div>
    </nav>

    <div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title mb-4">Bienvenido al Sistema</h2>
                    <p class="text-muted">Módulo de control para Clientes, Facturas y Tickets de Soporte (Arquitectura Laravel).</p>
                    
                    <hr>

                    <!-- AQUÍ EMPIEZA EL FORMULARIO DE REGISTRO -->
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

                        <button type="submit" class="btn btn-primary">Guardar Cliente</button>
                    </form>
                    <!-- AQUÍ TERMINA EL FORMULARIO -->

                </div>
            </div>
        </div>
    </div>
</div>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <div class="p-3 border bg-white rounded shadow-sm">
                                    <h5>Clientes</h5>
                                    <p class="text-muted small">Gestión de registros y servicios M:M.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 border bg-white rounded shadow-sm">
                                    <h5>Tickets</h5>
                                    <p class="text-muted small">Soporte y estados de atención.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 border bg-white rounded shadow-sm">
                                    <h5>Facturas</h5>
                                    <p class="text-muted small">Auditoría y Soft Deletes.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>