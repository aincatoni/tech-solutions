@extends('layouts.app')

@section('title', 'Iniciar Sesion')

@section('content')
<div class="container auth-shell d-flex align-items-center">
    <div class="row align-items-center g-4 w-100 py-4 py-lg-5">
        <div class="col-lg-6">
            <div class="hero-block">
                <span class="metric-chip mb-3">Acceso seguro</span>
                <h1 class="hero-title mb-3">Gestiona proyectos con una interfaz mas clara y actual.</h1>
                <p class="page-copy text-muted-hero mb-0">
                    Inicia sesion para ver, crear y administrar proyectos protegidos por autenticacion.
                </p>
            </div>
        </div>

        <div class="col-lg-5 ms-lg-auto">
            <div class="card section-card">
                <div class="card-header border-0 px-4 pt-4 pb-0">
                    <h2 class="h4 mb-1">Iniciar sesion</h2>
                    <p class="text-muted-hero mb-0">Usa tu correo y contrasena para entrar al sistema.</p>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('login.store') }}" class="d-grid gap-3">
                        @csrf

                        <div>
                            <label for="email" class="form-label">Correo electronico</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="nombre@correo.com">
                            @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="form-label">Contrasena</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Ingresa tu contrasena">
                            @error('password')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg">Entrar</button>

                        <p class="mb-0 text-muted-hero text-center">
                            No tienes cuenta?
                            <a href="{{ route('register') }}" class="btn btn-link p-0 align-baseline text-decoration-none">Registrate aqui</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
