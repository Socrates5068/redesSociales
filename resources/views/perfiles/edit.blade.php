@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.css" integrity="sha512-qjOt5KmyILqcOoRJXb9TguLjMgTLZEgROMxPlf1KuScz0ZMovl0Vp8dnn9bD5dy3CcHW5im+z5gZCKgYek9MPA==" crossorigin="anonymous" />
@endsection

@section('botones')
    <a href="{{route('comunicados.index')}}" class="btn btn-outline-danger mr-2 text-uppercase font-weight-bold">
        <svg class="icono" viewBox="0 0 20 20" fill="currentColor" className="chevron-left w-6 h-6"><path fillRule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clipRule="evenodd" /></svg>
        Volver</a>
@endsection

@section('content')
    <h1 class="text-center">Editar mi perfil</h1>

    <div class="row justify-content-center mt-5">
        <div class="col-md-10 bg-white p-3 shadow">
            <form
            action="{{ route('perfiles.update', ['perfil' => $perfil->id ]) }}"
            method="POST"
            enctype="multipart/form-data"
            >
            @csrf
            @method('PUT')

                <div class="form-group">
                    <label for="nombre">Nombre</label>

                    <input type="text" 
                    name="nombre" 
                    class="form-control @error('nombre') is-invalid @enderror "
                    id="nombre" 
                    placeholder="Tu nombre"
                    value= "{{$perfil->usuario->name}}"                    
                    />

                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="biografia">Biografía</label>
                <input id="biografia" type="hidden" name="biografia" value="{{ $perfil->biografia }}" />
                    <trix-editor 
                        class="form-group @error ('biografia') is-invalid @enderror"
                        input="biografia">
                    </trix-editor>

                    @error('biografia')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="imagen">Tu imagen</label>
                    <input 
                        id="imagen"
                        type="file"
                        class="form-control @error('imagen') isinvalid @enderror"
                        name="imagen"
                    />

                    @if ($perfil->imagen)
                        <div class="mt-4">
                            <p>Imagen Actual</p>
                        <img src="/storage/{{$perfil->imagen}}" style="height: 300px;">

                        </div>

                        @error('imagen')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    @endif
                </div>
                
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Actualizar perfil" />
                </div>

            </form>
        </div>
    </div>


@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.js" integrity="sha512-zEL66hBfEMpJUz7lHU3mGoOg12801oJbAfye4mqHxAbI0TTyTePOOb2GFBCsyrKI05UftK2yR5qqfSh+tDRr4Q==" crossorigin="anonymous" defer></script>
@endsection