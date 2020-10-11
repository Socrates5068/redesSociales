<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Traits\Timestamp;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index()
    {
        //$usuario = auth()->user()->id;
        //paginacion de comunicados
        //$comunicados = Comunicado::where('user_id', $usuario)->latest()->paginate(6);
        $users = DB::table('users')->latest()->paginate(10);

        return view('usuarios.index')->with('users', $users);
    }

    public function edit(User $user)
    {
        //Revisar el policy
        //$this->authorize('view', $comunicado);

        return view('usuarios.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = request()->validate([
            'email' => 'required',
            'alta' => 'required',
            'rol' => 'required',
        ]);

        //Asignar los valores
        if ($user->hasVerifiedEmail()) {
            if ($data['alta'] == "no") {
                $user->email = $data['email'];
                $user->email_verified_at = null;
                $user->rol = $data['rol'];

                $user->save();

                return redirect()->action('UserController@index');
            } else {
                $user->email = $data['email'];
                $user->rol = $data['rol'];

                $user->save();

                return redirect()->action('UserController@index');
            }
        } else {
            if ($data['alta'] == "no") {
                $user->email = $data['email'];
                $user->rol = $data['rol'];

                $user->save();

                return redirect()->action('UserController@index');
            } else {
                $user->email = $data['email'];
                $user->email_verified_at = $user->created_at;
                $user->rol = $data['rol'];

                $user->save();

                return redirect()->action('UserController@index');
            }
        }
    }
}
