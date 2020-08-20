@extends('layouts.app')

@section('botones')
    <a href="{{route('comunicados.create')}}" class="btn btn-primary mr-2">Crear comunicado</a>
@endsection

@section('content')
    <h2 class="text-center mb-5">Administrar comunicados</h2>

    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Titulo</th>
                    <th scole="col">Comunicado</th>
                    <th scole="col">Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach($comunicados as $comunicado)
                <tr>
                    <td>{{$comunicado->titulo}}</td>
                    <td>{{$comunicado->mensaje}}</td>
                    <td>
                        <a href="" class="btn btn-danger">Eliminar</a>
                        <a href="" class="btn btn-dark">Editar</a>
                        <a href="{{ route ('comunicados.show', ['comunicado' => $comunicado->id]) }}" class="btn btn-success">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection