<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;



class UsersController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();
        $usuario = User::where('name','=',$data['usuario'])->first();
        if ($usuario) {
            // Genera un nuevo remember_token aleatorio
            $rememberToken = Str::random(60);

            // Asigna el remember_token al usuario
            $usuario->remember_token = $rememberToken;
            $usuario->save();

            return $usuario;
        } else {
            return "Usuario o contraseña incorrectos.";
        }

    }
}
