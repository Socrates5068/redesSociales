@extends('layouts.app')

@section('botones')
    <a href="javascript:history.back()" class="btn btn-outline-danger mr-2 text-uppercase font-weight-bold">
        <svg class="icono" viewBox="0 0 20 20" fill="currentColor" className="chevron-left w-6 h-6"><path fillRule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clipRule="evenodd" /></svg>
        Volver</a>
@endsection

@section('content')
<div class="container col-9 bg-white p-3 shadow">
    <h1 class="text-center mb-4">{{$comunicado->titulo}}</h1>

    <div class="imagen-comunicado">
    <img src="/storage/{{$comunicado->imagen}}" class="w-100" style="img.responsive: max-width: 100%; height: auto;">
    </div>

    <div class="receta-meta mt-3">
        <p>
            <span class="font-weigth-bold text-primary">Autor:</span>
            <a class="text-dark" href="{{ route('perfiles.show', ['perfil' => $comunicado->autor->id])}}">
            {{$comunicado->autor->name}}
            </a>
        </p>
    </div>

    <div class="receta-meta">
        <p>
            <span class="font-weigth-bold text-primary">Fecha:</span>
            @php
                $fecha = $comunicado->created_at
            @endphp

            <fecha-comunicado fecha="{{$fecha}}"></fecha-comunicado>
        </p>
    </div>

    <div class="comunicado">
        <h2 class="my-3 text-primary"> Comunicado</h2>
        {!! $comunicado->mensaje !!}
    </div>
</div>
@endsection