<?php

namespace App\Http\Controllers;

use App\Comunicado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InicioController extends Controller
{
    public function index (){
        //Obtener los comunicados mas nuevos
        //$nuevas = Comunicado::orderBy('created_at', 'DESC')->get();
        $nuevas = Comunicado::latest()->take(5)->get();
        $comunicados = DB::table('comunicados')->latest()->paginate(6);
        return view('inicio.index', compact('nuevas', 'comunicados'));
    }
}
