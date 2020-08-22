<?php

namespace App\Http\Controllers;

use App\Comunicado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ComunicadoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comunicados = auth()->user()->comunicados;
        
        return view('comunicados.index')->with('comunicados', $comunicados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comunicados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validación
        $data = request()->validate([
            'titulo' => 'required|min:6',
            'mensaje' => 'required',
            'imagen' => 'required|image'
        ]);

        //obtener la ruta de la imagen
        $ruta_imagen = $request['imagen']->store('upload-comunicados', 'public');

        //Redimensionar la imagen
        $img = Image::make (public_path("storage/{$ruta_imagen}"))->fit(720, 960);
        $img->save ();

        //almacenar en la bd (sin modelo)
        /* DB::table('comunicados')->insert([
            'titulo' => $data['titulo'],
            'mensaje' => $data['mensaje'],
            'imagen' => $ruta_imagen,
            'user_id' => Auth::user()->id,
        ]); */

        //almacenar en la bd (con modelo)

        auth()->user()->comunicados()->create([
            'titulo' => $data['titulo'],
            'mensaje' => $data['mensaje'],
            'imagen' => $ruta_imagen
        ]);

        //Redireccionar
        return redirect()->action('ComunicadoController@index');

        dd( $request->all() );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comunicado  $comunicado
     * @return \Illuminate\Http\Response
     */
    public function show(Comunicado $comunicado)
    {
        return view('comunicados.show', compact('comunicado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comunicado  $comunicado
     * @return \Illuminate\Http\Response
     */
    public function edit(Comunicado $comunicado)
    {
        return view('comunicados.edit', compact('comunicado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comunicado  $comunicado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comunicado $comunicado)
    {
        //Revisar el policy
        $this->authorize('update', $comunicado);

        //validación
        $data = request()->validate([
            'titulo' => 'required|min:6',
            'mensaje' => 'required',
        ]);

        //Asignar los valores
        $comunicado->titulo = $data['titulo'];
        $comunicado->mensaje = $data['mensaje'];

        //si es usuario sube una nueva imagen
        if(request('imagen')){
            //obtener la ruta de la imagen
            $ruta_imagen = $request['imagen']->store('upload-comunicados', 'public');

            //Redimensionar la imagen
            $img = Image::make (public_path("storage/{$ruta_imagen}"))->fit(720, 960);
            $img->save();

            //Asignar al objeto
            $comunicado->imagen = $ruta_imagen;
        }

        $comunicado->save();

        //redireccionar
        return redirect()->action('ComunicadoController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comunicado  $comunicado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comunicado $comunicado)
    {
        //
    }
}
