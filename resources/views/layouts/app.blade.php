<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Horarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Generador de Horarios</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('subjects*') ? 'active' : '' }}" href="{{ route('subjects.index') }}">
                            <i class="bi bi-book"></i> Materias
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('groups*') ? 'active' : '' }}" href="{{ url('groups') }}">
                            <i class="bi bi-people"></i> Grupos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('teachers*') ? 'active' : '' }}" href="{{ url('teachers') }}">
                            <i class="bi bi-person-badge"></i> Maestros
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('classrooms*') ? 'active' : '' }}" href="{{ url('classrooms') }}">
                            Salones
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('labs*') ? 'active' : '' }}" href="{{ url('labs') }}">
                            Laboratorios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('assigned_labs*') ? 'active' : '' }}" href="{{ url('assigned_labs') }}">
                            Laboratorios Asignados
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('assigned_classes*') ? 'active' : '' }}" href="{{ url('assigned_classes') }}">
                            Clases
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
