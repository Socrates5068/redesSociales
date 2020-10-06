@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="titulo-categoria text-uppercase mt-5 mb-4">
            Resultados de la busqueda: {{$busqueda}}
        </h2>
        <div class="row">
            @foreach($comunicados as $comunicado)
                @include('ui.comunicado')                
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $comunicados->links() }}
        </div>
    </div>
@endsection