<div class="col-md-4 mt-4">
    <div class="card shadow">
        <img class="card-img-top" src="/storage/{{ $comunicado->imagen }}" alt="imagen comunicado">
        <div class="card-body">
            <h3 class="card-title">{{$comunicado->titulo}}</h3>

            <div class="meta-comunicados d-flex justify-content-between">
                @php
                    $fecha = $comunicado->created_at
                @endphp

                <p class="text-primary fecha font-weight-bold">
                    <fecha-comunicado fecha="{{$fecha}}" ></fecha-comunicado>
                </p>
            </div>

            <a href="{{ route('comunicados.show', ['comunicado' => $comunicado->id ])}}"
                class="btn btn-primary d-block btn-receta">Ver comunicado
            </a>
        </div>
    </div>
</div>