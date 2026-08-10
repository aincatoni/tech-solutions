<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion de Proyectos')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --page-bg: linear-gradient(180deg, #fafaf9 0%, #f5f5f4 100%);
            --glass-bg: rgba(255, 255, 255, 0.78);
            --glass-border: rgba(15, 23, 42, 0.08);
            --glass-strong: rgba(255, 255, 255, 0.92);
            --text-soft: #64748b;
            --shadow-soft: 0 24px 60px rgba(15, 23, 42, 0.08);
        }

        body {
            min-height: 100vh;
            background: var(--page-bg);
            color: #0f172a;
        }

        body::before,
        body::after {
            content: '';
            position: fixed;
            inset: auto;
            width: 28rem;
            height: 28rem;
            border-radius: 999px;
            filter: blur(40px);
            opacity: 0.35;
            pointer-events: none;
            z-index: 0;
        }

        body::before {
            top: -8rem;
            right: -6rem;
            background: rgba(148, 163, 184, 0.22);
        }

        body::after {
            bottom: -10rem;
            left: -8rem;
            background: rgba(203, 213, 225, 0.55);
        }

        .app-shell {
            position: relative;
            z-index: 1;
        }

        .glass-panel,
        .card,
        .table-wrap,
        .list-group-item,
        .alert {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            box-shadow: var(--shadow-soft);
        }

        .navbar {
            background: rgba(255, 255, 255, 0.72) !important;
            border-bottom: 1px solid rgba(15, 23, 42, 0.06);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.04em;
            color: #0f172a !important;
        }

        .nav-link,
        .navbar-brand,
        .form-label,
        .card,
        .table,
        .list-group-item,
        .btn-link,
        .page-copy,
        .text-muted-hero {
            color: #0f172a !important;
        }

        .text-muted-hero {
            color: var(--text-soft) !important;
        }

        .btn-primary {
            background: #111827;
            border: 1px solid #111827;
            box-shadow: 0 14px 28px rgba(15, 23, 42, 0.12);
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background: #1f2937;
            border-color: #1f2937;
        }

        .btn-secondary,
        .btn-warning,
        .btn-info,
        .btn-danger,
        .btn-outline-light {
            border-color: rgba(15, 23, 42, 0.12);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.72);
            color: #0f172a;
        }

        .btn-info {
            background: rgba(241, 245, 249, 0.92);
            color: #0f172a;
        }

        .btn-warning {
            background: rgba(255, 251, 235, 0.92);
            color: #92400e;
        }

        .btn-danger {
            background: rgba(254, 242, 242, 0.96);
            color: #b91c1c;
        }

        .btn-secondary:hover,
        .btn-info:hover,
        .btn-warning:hover,
        .btn-danger:hover,
        .btn-outline-light:hover {
            color: #0f172a;
            border-color: rgba(15, 23, 42, 0.18);
        }

        .btn-outline-light {
            background: rgba(255, 255, 255, 0.72);
            color: #0f172a;
        }

        .card {
            border-radius: 1.5rem;
            overflow: hidden;
        }

        .card-header {
            background: rgba(255, 255, 255, 0.58);
            border-bottom: 1px solid rgba(15, 23, 42, 0.06);
            color: #0f172a;
            font-weight: 600;
        }

        .form-control,
        .form-select {
            background: rgba(255, 255, 255, 0.86);
            border: 1px solid rgba(15, 23, 42, 0.08);
            color: #0f172a;
            border-radius: 0.9rem;
            padding: 0.8rem 1rem;
        }

        .form-control:focus,
        .form-select:focus {
            background: #fff;
            color: #0f172a;
            border-color: rgba(15, 23, 42, 0.18);
            box-shadow: 0 0 0 0.25rem rgba(15, 23, 42, 0.06);
        }

        .form-control::placeholder {
            color: #94a3b8;
        }

        .form-select option {
            color: #0f172a;
        }

        .table-wrap {
            border-radius: 1.5rem;
            overflow: hidden;
        }

        .table {
            margin-bottom: 0;
        }

        .table > :not(caption) > * > * {
            background: transparent;
            color: #0f172a;
            border-bottom-color: rgba(15, 23, 42, 0.06);
            padding: 1rem;
        }

        .table thead th {
            color: #64748b;
            font-size: 0.82rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .badge {
            border-radius: 999px;
            padding: 0.55rem 0.8rem;
        }

        .bg-info {
            background: #eef2ff !important;
            color: #3730a3 !important;
        }

        .list-group-item {
            color: #0f172a;
        }

        .alert-success {
            color: #166534;
        }

        .alert-danger {
            color: #b91c1c;
        }

        .hero-block {
            padding: 3rem 0 1rem;
        }

        .hero-title {
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 800;
            letter-spacing: -0.03em;
        }

        .auth-shell {
            min-height: calc(100vh - 11rem);
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            margin: 2rem 0 1.5rem;
        }

        .page-heading h1 {
            margin: 0;
            font-size: clamp(1.7rem, 4vw, 2.5rem);
            font-weight: 700;
        }

        .section-card {
            border-radius: 1.5rem;
        }

        .metric-chip {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.55rem 0.9rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(15, 23, 42, 0.06);
            color: #0f172a;
        }

        @media (max-width: 767.98px) {
            .page-heading {
                flex-direction: column;
                align-items: stretch;
            }

            .table-wrap {
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <div class="app-shell">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ auth()->check() ? route('proyectos.index') : route('login') }}">Tech Solutions</a>

            <div class="collapse navbar-collapse show" id="mainNavbar">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('proyectos.index') }}">Proyectos</a>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link">{{ auth()->user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="m-0">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm">Cerrar sesion</button>
                            </form>
                        </li>
                    @endauth

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Iniciar sesion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger rounded-4" role="alert">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        @yield('content')
    </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
