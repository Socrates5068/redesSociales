<?php

namespace App\Http\Controllers;

use App\Comunicado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ComunicadoController extends Controller
{

    public function __construct()
    {
     $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('comunicados.index');
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

        //almacenar en la bd
        DB::table('comunicados')->insert([
            'titulo' => $data['titulo'],
            'mensaje' => $data['mensaje'],
            'imagen' => $ruta_imagen,
            'user_id' => Auth::user()->id,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comunicado  $comunicado
     * @return \Illuminate\Http\Response
     */
    public function edit(Comunicado $comunicado)
    {
        //
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
        //
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
