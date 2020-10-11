<?php

namespace App\Http\Controllers;

use auth;
use App\User;
use App\Perfil;
use App\Comunicado;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
        $this->middleware('verified', ['except' => 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        //Obtener las recetas con paginacion
        $comunicados = Comunicado::where('user_id', $perfil->user_id)->paginate(6);

        return view('perfiles.show', compact('perfil', 'comunicados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        // Ejecutar el policy
        $this->authorize('update', $perfil);

        return view('perfiles.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        //Ejecutar el policy
        $this->authorize('update', $perfil);

        //validar
        $data = request()->validate([
            'nombre' => 'required',
            'biografia' => 'required'
        ]);

        //Si el usuario sube una imagen
        if ( $request['imagen']) {
            $ruta_imagen = $request['imagen']->store('upload-perfiles', 'public');

            //Resize de la imagen
            $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(600, 600);

            //Crear un arreglo de imagen
            $array_imagen = ['imagen' =>$ruta_imagen];
        }

        //Asignar nombre
        auth()->user()->name = $data['nombre'];
        auth()->user()->save();

        //Eliminar url y name de $data
        unset($data['nombre']);

        //Guardar informacion
        //Asignar biografia e imagen
        auth()->user()->perfil()->update( array_merge(
            $data,
            $array_imagen ?? []
        ) );

        //redireccionar
        return redirect()->action('ComunicadoController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
