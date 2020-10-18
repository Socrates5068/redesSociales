@extends('layouts.app')

@section('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />

@endsection

@section('hero')
    <div class="hero-comunicados">
        <form action="{{ route('buscar.show') }}" class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-md-4 texto-buscar">
                    <p class="display-4">Encuentra un comunicado</p>
                    <input
                        type="search"
                        name="buscar"
                        class="form-control"
                        placeholder="Buscar Comunicado"
                    />
                </div>
            </div>
        </form>
    </div>    
@endsection

@section('content')
    
    <div class="container nuevas-recetas col-12">
        <h2 class="titulo-categoria text-uppercase mb-4">Ultimos comunicados</h2>
        
        <div class="owl-carousel owl-theme">
            @foreach($nuevas as $nueva)
            <div class="card">                
                <img src="/storage/{{ $nueva->imagen}}" class="card-img-top" alt="imagen comunicado" {{-- style="width: 100px;" --}}>

                <div class="card-body h-100">
                    <h3>{{ Str::title ($nueva->titulo) }}</h3>

                    <p>{{ Str::words( strip_tags( $nueva->mensaje ), 20 ) }}</p>

                    <a href="{{ route('comunicados.show', ['comunicado' => $nueva->id ])}}"
                        class="btn btn-primary d-block font-weight-bold text-uppercase btn-receta fixed-bottom mb-1"
                    >Ver comunicado</a>
                </div>
            </div>
            @endforeach
        </div>
        <h2 class="text-center my-5">Todos los comunicados</h2>
        <div class="container">
            <div class="row mx-auto bg-white p-4 shadow">
                @foreach($comunicados as $comunicado)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="/storage/{{$comunicado->imagen}}" class="card-img-top">
                            <div class="card-body shadow">
                                <h3 class="d-flex justify-content-center">{{$comunicado->titulo}}</h3>
                                <a href="{{ route('comunicados.show', ['comunicado' => $comunicado->id]) }}" 
                                    class="btn btn-primary d-block mt-4 text-uppercase font-weight-bold btn-receta">Ver comunicado</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {{$comunicados->links()}}
            </div>
        </div>
    </div>
    
@endsection