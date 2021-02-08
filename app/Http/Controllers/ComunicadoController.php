<?php

namespace App\Http\Controllers;

use App\Tweet;
use App\Comunicado;
use App\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//Twitter
use App\Notifications\TweetPublished;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Notification;
use TelegramBot\Api\Types\InputMedia\InputMediaPhoto;

//Telegram
require_once "../vendor/autoload.php";

class ComunicadoController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth', ['except' => ['show', 'search']]);
        $this->middleware('verified', ['except' => ['show', 'search']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$comunicados = auth()->user()->comunicados;
        $usuario = auth()->user()->id;
        //paginacion de comunicados
        $comunicados = Comunicado::where('user_id', $usuario)->latest()->paginate(6);

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
            'titulo' => 'required|min:4',
            'mensaje' => 'required|max:2000',
            'uuid' => 'required',
            'imagen' => 'image'
        ]);

        if ($request['imagen'] != null) {
            //obtener la ruta de la imagen
            $ruta_imagen = $request['imagen']->store('upload-comunicados', 'public');      
            
            //Redimensionar la imagen
            $img = Image::make(public_path("storage/{$ruta_imagen}"))->resize(900, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save();



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
                'imagen' => $ruta_imagen,
                'uuid' => $data['uuid']
            ]);
            
            //Publicar en Twitter
            /* $message = Tweet::create([
                'tweet' => strip_tags($data['mensaje']),
                'img' => $ruta_imagen
            ]);

            $message->notify(new TweetPublished());
            $message->delete(); */

            //Publicar en Telegram
            /*$bot = new \TelegramBot\Api\BotApi('1411157049:AAFKE0FnIRvOS_h8vkJoyhceiUctiaLE33c');
            $bot->sendMessage("-426827268", strip_tags($data['mensaje']));
            
            $media = new \TelegramBot\Api\Types\InputMedia\ArrayOfInputMedia();
            $media->addItem(new \TelegramBot\Api\Types\InputMedia\InputMediaPhoto('https://socialsistemas.com/storage/'.$ruta_imagen));
            //$media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaPhoto('https://avatars3.githubusercontent.com/u/9335727'));
            // Same for video
            // $media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaVideo('http://clips.vorwaerts-gmbh.de/VfE_html5.mp4'));
            $bot->sendMediaGroup("-426827268", $media);*/

            ##Publicar en facebook
            /*$fields = array('url' => 'https://socialsistemas.com/storage/'.$ruta_imagen, 'caption' => strip_tags($data['mensaje']), 'access_token' => 'EAAJlNVhYjRMBABGWlmIQrjab0aDEqsVBwaffdW5U4INWN8JWyO2riBu4NbiTeUZCkZBX2nBCzpnJlOZA6ENy6y1jPDMD6nY2RmTO1IrWvBvFmc9xdn8ZBGY0AWF6awwZAIhF2SccvWGvzMahowyApMTsTFbHg4CZBcvggMfZAllOSh5JwKGisqTOyJHcYToeB0ZD');
            $fields_string = http_build_query($fields);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/103785118245947/photos");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            $data = curl_exec($ch);
            curl_close($ch);*/

            //Redireccionar
            return redirect()->action('ComunicadoController@index');

            dd($request->all());
        } else {

            auth()->user()->comunicados()->create([
                'titulo' => $data['titulo'],
                'mensaje' => $data['mensaje'],
                'uuid' => $data['uuid']
            ]);

            #Publicar en Twitter
            /* $message = Tweet::create([
                'tweet' => strip_tags($data['mensaje']),
            ]);

            $message->notify(new TweetPublished());
            $message->delete(); */

            #Publicar en Telegram
            /*$bot = new \TelegramBot\Api\BotApi('1411157049:AAFKE0FnIRvOS_h8vkJoyhceiUctiaLE33c');
            $bot->sendMessage("-426827268", strip_tags($data['mensaje']));*/

            #Publicar en facebook
            /*$fields = array('message' => strip_tags($data['mensaje']), 'access_token' => 'EAAJlNVhYjRMBABGWlmIQrjab0aDEqsVBwaffdW5U4INWN8JWyO2riBu4NbiTeUZCkZBX2nBCzpnJlOZA6ENy6y1jPDMD6nY2RmTO1IrWvBvFmc9xdn8ZBGY0AWF6awwZAIhF2SccvWGvzMahowyApMTsTFbHg4CZBcvggMfZAllOSh5JwKGisqTOyJHcYToeB0ZD');
            $fields_string = http_build_query($fields);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/103785118245947/feed");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            $data = curl_exec($ch);
            curl_close($ch);*/

            //Redireccionar
            return redirect()->action('ComunicadoController@index');

            dd($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comunicado  $comunicado
     * @return \Illuminate\Http\Response
     */
    public function show(Comunicado $comunicado)
    {
        $imagenes = Imagen::where('id_comunicado', $comunicado->uuid)->get();
        $comunicado->imagenes = $imagenes;
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
        //Revisar el policy
        $this->authorize('view', $comunicado);

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
        if (request('imagen')) {
            //obtener la ruta de la imagen
            $ruta_imagen = $request['imagen']->store('upload-comunicados', 'public');

            //Redimensionar la imagen
            $img = Image::make(public_path("storage/{$ruta_imagen}"))->fit(720, 960);
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

        //Ejecutar el Policy
        $this->authorize('delete', $comunicado);

        //Eliminar la receta
        $comunicado->delete();

        return redirect()->action('ComunicadoController@index');
    }

    public function search(Request $request)
    {
        $busqueda = $request->get('buscar');
        $comunicados = Comunicado::where('titulo', 'like', '%' . $busqueda . '%')->paginate(6);
        $comunicados->appends(['buscar' => $busqueda]);

        return view('busquedas.show', compact('comunicados', 'busqueda'));
    }
}
