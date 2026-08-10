@extends('layouts.app')

@section('title', 'Registro')

@section('content')
<div class="container auth-shell d-flex align-items-center">
    <div class="row align-items-center g-4 w-100 py-4 py-lg-5">
        <div class="col-lg-6 order-2 order-lg-1">
            <div class="card section-card">
                <div class="card-header border-0 px-4 pt-4 pb-0">
                    <h2 class="h4 mb-1">Crear cuenta</h2>
                    <p class="text-muted-hero mb-0">Registra un usuario para ingresar y crear proyectos asociados a tu perfil.</p>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register.store') }}" class="d-grid gap-3">
                        @csrf

                        <div>
                            <label for="name" class="form-label">Nombre</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Tu nombre completo">
                            @error('name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="form-label">Correo electronico</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="nombre@correo.com">
                            @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="form-label">Contrasena</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Minimo 8 caracteres">
                            @error('password')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div>
                            <label for="password-confirm" class="form-label">Confirmar contrasena</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Repite tu contrasena">
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg">Crear cuenta</button>

                        <p class="mb-0 text-muted-hero text-center">
                            Ya tienes cuenta?
                            <a href="{{ route('login') }}" class="btn btn-link p-0 align-baseline text-decoration-none">Inicia sesion</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-5 ms-lg-auto order-1 order-lg-2">
            <div class="hero-block py-0">
                <span class="metric-chip mb-3">Registro rapido</span>
                <h1 class="hero-title mb-3">Crea tu acceso y vincula cada proyecto a su creador.</h1>
                <p class="page-copy text-muted-hero mb-0">
                    El sistema guarda tu cuenta con contrasena cifrada y protege todas las rutas internas.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
