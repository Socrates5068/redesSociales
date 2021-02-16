<?php

namespace App\Http\Controllers;

use App\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    public function store( Request $request )
    {
        // leer el archivo
        $ruta_archivo = $request->file('file')->store('archivos', 'public');
        //$ruta_archivo = Storage::disk('local')->put('archivos/' . $request->getClientOriginalName() . $request->getClientOriginalExtension() ,$request->file);
        /* $ruta_archivo = $request->file('file')->storeAs(
            'archivos', $request->file->getClientOriginalName()
        ); */
        
        // Almacenar con Modelo
        $archivoDB = new Archivo;
        $archivoDB->id_comunicado = $request['uuid'];
        $archivoDB->ruta_archivo = $ruta_archivo;

        $archivoDB->save();

        // Retornar respuesta
        $respuesta = [
            'archivo' => $ruta_archivo
        ];

        return response()->json($respuesta);
    }

    // Elimina una imagen de la BD y del servidor
    public function destroy( Request $request )
    {
        // Validación
        /* $uuid = $request->get('uuid');
        $comunicado = Comunicado::where('uuid', $uuid)->first();
        $this->authorize('delete', $comunicado); */

        // Imagen a eliminar
        $archivo = $request->get('archivo');

        if(File::exists('storage/' . $archivo)) {
           // Elimina archivo del servidor
           File::delete('storage/' . $archivo);

           // elimina archivo de la BD
           Archivo::where('ruta_archivo', $archivo )->delete();

           $respuesta = [
                'mensaje' => 'Archivo Eliminado',
                'archivo' => $archivo
            ];
        }

        return response()->json($respuesta);
    }
}
