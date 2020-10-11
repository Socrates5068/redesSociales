@extends('layouts.app')

@section('botones')
    <a href="javascript:history.back()" class="btn btn-outline-danger mr-2 text-uppercase font-weight-bold">
        <svg class="icono" viewBox="0 0 20 20" fill="currentColor" className="chevron-left w-6 h-6">
            <path fillRule="evenodd"
                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                clipRule="evenodd" /></svg>
        Volver</a>
@endsection
@if (Auth::check())
    @if (Auth::user()->isAdmin())

        @section('content')
            <h1 class="text-center mb-5">Editar Usuario: {{ $user->name }}</h1>

            <div class="row justify-content-center mt-5">
                <div class="col-md-8">
                    <form method="POST" action="{{ route('usuarios.update', ['user' => $user->id]) }}"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="email">Correo</label>

                            <input id="email" type="text" name="email"
                                class="form-control @error('email') is-invalid @enderror " placeholder="Email de usuario"
                                value="{{ $user->email }}" />

                            @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="verify">Permiso para publicar</label>
                            @if ($user->email_verified_at == null)
                                <select name="alta" id="alta">
                                    <option value="no">No</option>
                                    <option value="si">Sí</option>
                                </select>
                            @else
                                <select name="alta" id="alta">
                                    <option value="si">Sí</option>
                                    <option value="no">No</option>
                                </select>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="rol">Rol</label>
                            @if ($user->rol == 'admin')
                                <select name="rol" id="rol">
                                    <option value="admin">Administrador</option>
                                    <option value="user">Usuario</option>
                                </select>
                            @else
                                <select name="rol" id="rol">
                                    <option value="user">Usuario</option>
                                    <option value="admin">Administrador</option>
                                </select>
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Actualizar usuario" />
                        </div>

                    </form>
                </div>
            </div>

        @endsection
    @else
        @section('content')
            <div class="justify-content-center">
                <h2 class="text-center">Solo los administradores tienen acceso aqui :)<h2>
            </div>
        @endsection
    @endif
@endif
