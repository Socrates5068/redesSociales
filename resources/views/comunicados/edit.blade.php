@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.css" integrity="sha512-qjOt5KmyILqcOoRJXb9TguLjMgTLZEgROMxPlf1KuScz0ZMovl0Vp8dnn9bD5dy3CcHW5im+z5gZCKgYek9MPA==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
@endsection

@section('botones')
    <a href="{{route('comunicados.index')}}" class="btn btn-outline-danger mr-2 text-uppercase font-weight-bold">
        <svg class="icono" viewBox="0 0 20 20" fill="currentColor" className="chevron-left w-6 h-6"><path fillRule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clipRule="evenodd" /></svg>
        Administrar comunicados</a>
@endsection

@section('content')
<h1 class="text-center mb-5">Editar comunicados: {{$comunicado->titulo}}</h1>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
        <form method="POST" action="{{ route('comunicados.update', ['comunicado' => $comunicado->id])}}" enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="titulo">Titulo comunicado</label>

                    <input type="text" name="titulo" 
                    class="form-control @error('titulo') is-invalid @enderror "
                    id="titulo" 
                    placeholder="Titulo comunicado"
                    value= "{{$comunicado->titulo}}"                    
                    />

                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="mensaje">Comunicado</label>
                    <input id="mensaje" type="hidden" name="mensaje" value="{{ $comunicado->mensaje }}" />
                    <trix-editor 
                        class="form-group @error ('mensaje') is-invalid @enderror"
                        input="mensaje">
                    </trix-editor>

                    @error('mensaje')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="imagen">Elige una imagen</label>
                    <input 
                        id="imagen"
                        type="file"
                        class="form-control @error('imagen') isinvalid @enderror"
                        name="imagen"
                    />

                    @if($comunicado->imagen)
                        
                        <div class="mt-4">
                            <p>Imagen Actual</p>
                        <img src="/storage/{{$comunicado->imagen}}" style="height: 300px;">

                        </div>
                    @endif
                        
                    

                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                
                <div>
                    <div class="form-group">
                        <label for="imagen">Imágenes</label>
                        <div id="dropzone" class="dropzone form-control"></div>
                    </div>

                    @if(count($imagenes) > 0)
                        @foreach($imagenes as $imagen)
                            <input class="galeria" type="hidden" value="{{$imagen->ruta_imagen}}">
                        @endforeach
                    @endif
                </div>

                <div>
                    <div class="form-group">
                        <label for="imagen">Archivos</label>
                        <div id="dropzone2" class="dropzone"></div>
                    </div>

                    @if(count($archivos) > 0)
                        @foreach($archivos as $archivo)
                            <input class="galeria1" type="hidden" value="{{$archivo->ruta_archivo}}">
                        @endforeach
                    @endif
                </div>

                <input type="hidden" id="uuid" name="uuid" value="{{ $comunicado->uuid }}">

                <div class="form-group">
                     <input type="submit" class="btn btn-primary" value="Actualizar comunicado" />
                 </div>

            </form>
        </div>
    </div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.js" integrity="sha512-zEL66hBfEMpJUz7lHU3mGoOg12801oJbAfye4mqHxAbI0TTyTePOOb2GFBCsyrKI05UftK2yR5qqfSh+tDRr4Q==" crossorigin="anonymous" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.js" integrity="sha512-8l10HpXwk93V4i9Sm38Y1F3H4KJlarwdLndY9S5v+hSAODWMx3QcAVECA23NTMKPtDOi53VFfhIuSsBjjfNGnA==" crossorigin="anonymous" defer></script>
@endsection