@extends('layouts.app')

@section('content')
<div class="container col-9 bg-white p-3 shadow">
    <h1 class="text-center mb-4">{{$comunicado->titulo}}</h1>

    <div class="imagen-comunicado">
    <img src="/storage/{{$comunicado->imagen}}" class="w-100" style="height: 500px;">
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