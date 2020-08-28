@extends('layouts.app')
    
@section('botones')
    @include('ui.navegacion')
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
                    <td>{!! $comunicado->mensaje !!}</td>
                    <td>
                        <eliminar-comunicado
                            comunicado-id={{$comunicado->id}}
                        ></eliminar-comunicado>                       
                        <a href="{{ route ('comunicados.edit', ['comunicado' => $comunicado->id]) }}" class="btn btn-dark mr-1 w-100 d-block mb-2" class="btn btn-dark">Editar</a>
                        <a href="{{ route ('comunicados.show', ['comunicado' => $comunicado->id]) }}" class="btn btn-success mr-1 w-100 d-block">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-12 mt-4 justify-content-center d-flex">
            {{ $comunicados->links() }}
        </div>        
    </div>

@endsection