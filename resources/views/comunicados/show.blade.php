@extends('layouts.app')

@section('content')
<article class="contenido-receta">
    <h1 class="text-center mb-4">{{$comunicado->titulo}}</h1>

    <div class="imagen-comunicado">
    <img src="/storage/{{$comunicado->imagen}}" class="w-100">
    </div>

    <div class="receta-meta">
        <p>
            <span class="font-weigth-bold text-primary">Autor:</span>
            {{-- TODO: mostrarel usuario --}}
            {{$comunicado->autor->name}}
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
</article>
@endsection