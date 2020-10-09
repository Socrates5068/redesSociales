@extends('layouts.app')

@section('botones')
    <a href="{{route('comunicados.index')}}" class="btn btn-outline-danger mr-2 text-uppercase font-weight-bold">
        <svg class="icono" viewBox="0 0 20 20" fill="currentColor" className="chevron-left w-6 h-6"><path fillRule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clipRule="evenodd" /></svg>
        Administrar Comunicados</a>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-5">
            @if($perfil->imagen)
                <img src="/storage/{{$perfil->imagen}}" class="w-100 rounded-circle" alt="imagen chef">
            @endif
        </div>
        <div class="col-md-7 mt-5 mt-md-0">
        <h2 class="text-center mb-2 text-primary">{{$perfil->usuario->name}}</h2>
            <div class="biografia">
                {!! $perfil->biografia !!}
            </div>
        </div>
    </div>
</div>
<h2 class="text-center my-5">Comunicados creados por {{$perfil->usuario->name}}</h2>
<div class="container">
    <div class="row mx-auto bg-white p-4 shadow">
        @if(count($comunicados) > 0)
            @foreach($comunicados as $comunicado)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="/storage/{{$comunicado->imagen}}" class="card-img-top">
                        <div class="card-body shadow">
                            <h3 class="d-flex justify-content-center">{{$comunicado->titulo}}</h3>
                            <a href="{{ route('comunicados.show', ['comunicado' => $comunicado->id]) }}" class="btn btn-primary d-block mt-4 text-uppercase font-weight-bold">Ver comunicado</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
                <p class="text-center w-100"> No hay comunicados aún</p>
        @endif
    </div>
    <div class="d-flex justify-content-center">
        {{$comunicados->links()}}
    </div>
</div>

@endsection