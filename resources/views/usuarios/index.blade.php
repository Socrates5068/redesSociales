@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.css"
        integrity="sha512-qjOt5KmyILqcOoRJXb9TguLjMgTLZEgROMxPlf1KuScz0ZMovl0Vp8dnn9bD5dy3CcHW5im+z5gZCKgYek9MPA=="
        crossorigin="anonymous" />
@endsection
@section('botones')
    <a href="{{ route('comunicados.index') }}" class="btn btn-outline-danger mr-2 text-uppercase font-weight-bold">
        <svg class="icono" viewBox="0 0 20 20" fill="currentColor" className="chevron-left w-6 h-6">
            <path fillRule="evenodd"
                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                clipRule="evenodd" /></svg>
        Volver</a>
@endsection
@if (Auth::check())
    @if (Auth::user()->isAdmin())
        @section('content')
            <h1 class="text-center">Administrar usuarios</h1>
            <div class="col-md-10 mx-auto bg-white p-3 shadow">
                <table class="table">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th scole="col">Nombre</th>
                            <th scole="col">Correo</th>
                            <th scole="col">Permiso de publicación</th>
                            <th scole="col">Rol</th>
                            <th scole="col">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->email_verified_at }}</td>
                                <td>{{ $user->rol }}</td>
                                <td>
                                    <a href="{{ route('usuarios.edit', ['user' => $user->id]) }}"
                                        class="btn btn-dark mr-1 w-100 d-block mb-2" class="btn btn-dark">Editar</a>


                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-12 mt-4 justify-content-center d-flex">
                    {{ $users->links() }}
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
