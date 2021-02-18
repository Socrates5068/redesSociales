@extends('layouts.app')

@section('botones')
    <a href="javascript:history.back()" class="btn btn-outline-danger mr-2 text-uppercase font-weight-bold">
        <svg class="icono" viewBox="0 0 20 20" fill="currentColor" className="chevron-left w-6 h-6"><path fillRule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clipRule="evenodd" /></svg>
        Volver</a>
@endsection

@section('content')
<div class="container col-9 bg-white p-3 shadow">
    <h1 class="text-center mb-4">{{$comunicado->titulo}}</h1>

    @if(isset($comunicado->imagen))
        <div class="imagen-comunicado">
            <img src="/storage/{{$comunicado->imagen}}" 
            class="w-100 mb-5" style="img.responsive: max-width: 100%; height: auto;">
        </div>       
    @endif
    
    @php
        $imgs = $comunicado->imagenes;
    @endphp
    
    @if($imgs->count())
        <div class="form-group">
            <label for="prueba"><h3><strong>IMÁGENES DE REFERENCIA</strong></h2></label>
                <br>
                
            @foreach($imgs as $img)
                <a href="/storage/{{$img->ruta_imagen}}"><img src="/storage/{{$img->ruta_imagen}}" 
                class="" style="max-width: 200px; height: auto;" /></a>
            @endforeach    
        </div>
    @endif

    @php
        $archivos = $comunicado->archivos;
        $cont = 1;
    @endphp

    @if($archivos->count())  
        <div class="form-group">
            <strong><label for="prueba"><h3><strong>ARCHIVOS DE REFERENCIA</strong></h2></label></strong>
            <br>
            @foreach($archivos as $archivo)
                <strong><a href="/storage/{{$archivo->ruta_archivo}}" class="">Archivo {{$cont}}</a></strong>
                @php
                    $cont++;
                @endphp
            @endforeach    
        </div>
    @endif

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

    <div class="container col-12">
        <h2 class="my-3 text-primary"> Comunicado</h2>
        {!! $comunicado->mensaje !!}
    </div>
</div>
@endsection